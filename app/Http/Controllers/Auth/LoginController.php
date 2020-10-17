<?php

namespace App\Http\Controllers\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Socialite;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    protected $redirectfalse  ='/login';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated (Request $request, $user) {
        if ($user-> hasRole('superadministrator'))
        {return redirect()-> route('dashboard/index'); }
        elseif ($user-> hasRole('administrator'))
        {return redirect()-> route('prof/editcourse'); }
        else
        {return redirect()-> route('home'); }




    }

    /**
     * Redirect the user to the Linkedin authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Linkedin.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        if ($authUser == null){
            session()->flash('emailEnregistrer','Vous êtes déja inscris avec cette email !!');
            return redirect($this->redirectfalse);

        }
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }



    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        $authUser = User::where('email', $user->email)->first();
        if ($authUser){
            return null ;
        }

        $length = 10;
        $keyspace = '123456789abcdefghijkmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ';
        $str = '';
        $max = mb_strlen($keyspace, '8bit') - 1;
        for ($i = 0; $i < $length; ++$i) {
            $str .= $keyspace[random_int(0, $max)];
        }
        $password = Hash::make($str);

        $fileContents = file_get_contents($user->getAvatar());
         File::put(public_path() . '/storage/uploadUsers/avatar/' . $user->getId() . ".jpg", $fileContents);
        $user = User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => $password ,
            'provider' => $provider,
            'avatar' =>$fileContents,
            'provider_id' => $user->id,

        ]);
        $user->email_verified_at =  Carbon::now()->toDateTimeString();
        $user->save();
        $user->attachRole('user');
        return $user ;

    }
}
