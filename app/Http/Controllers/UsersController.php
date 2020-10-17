<?php

namespace App\Http\Controllers;
use Analytics;
use App\Http\Requests\Setting;
use Illuminate\Support\Facades\Auth;
use Spatie\Analytics\Period;
use App\Course;
use App\Http\Requests\banRequest;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Laravel\Cashier\Billable;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Stripe\Util\Set;

class UsersController extends Controller
{
    use Billable ;

    public function __construct()
    {
        $this->middleware('role:superadministrator|administrator');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function setting(){

        return view('dashboard.setting');
    }

    public function changeData(Setting $request){
    $var = Hash::check($request->password, Auth::user()->password);
    if ($var == true){
        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request->username;
        $user->password = bcrypt($request->newpass);
        $user->save();
        Alert::success('Bien Modifier', 'Vos informations sont a jour');

        return back();    }

    else{
        Alert::error('Données érronés', 'Vos informations sont par enregistré');

        return back();

    }


 }



    public function index()
    {

        $users = User::count();
        $profs = User::whereRoleIs('administrator')->count();
        $abonne = User::whereRoleIs('abonne')->count();



        $top_browser = Analytics::fetchTopBrowsers(Period::days(7))->first();
        if($top_browser != null){
            $top_browser = reset($top_browser);

        }
        else{
            $top_browser = 'Aucun' ;
        }
        $user_types = Analytics::fetchMostVisitedPages(Period::days(7));
        $pageTitle = data_get($user_types, '*.pageTitle');
        $pageViews = data_get($user_types, '*.pageViews');
        $url = data_get($user_types, '*.url');

        $topTitle = array_slice($pageTitle, 0, 1, true);
        $topViews= array_slice($pageViews, 0, 1, true);
        $url= array_slice($url, 0, 1, true);


        $topViews = reset($topViews);
        $topTitle = reset($topTitle);
        $url = reset($url);


        $cours = Course::count();



        $newUsers = User::orderBy('id','desc')->take(4)->get();

        return view('dashboard.index')
            ->with(compact('users','cours','profs','abonne','top_browser','topViews','topTitle','newUsers','url'));

    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
//        $users = User::orderBy('id','desc')->paginate(5);
        $fb = User::where('provider', 'facebook')->count();
        $google = User::where('provider', 'google')->count();
        $linkedin = User::where('provider', 'linkedin')->count();
        $direct = User::where('provider', null)->count();
        $name = $request->search ;
        $abonne = User::with('subscription')->whereNotNull('stripe_id')->count();
        $non = User::count();
        $non_abonne = $non - $abonne ;
        $search = User::with('subscription')->where('name', 'LIKE', "%$name%")->get();
        return view('dashboard.users')->with(compact('users', 'fb','google','linkedin','direct','search','name','abonne','non_abonne'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function showAll()
    {
        $users = User::with('subscription')->orderBy('id','desc')->paginate(5);
        $fb = User::where('provider', 'facebook')->count();
        $google = User::where('provider', 'google')->count();
        $linkedin = User::where('provider', 'linkedin')->count();
        $direct = User::where('provider', null)->count();
        $abonne = User::with('subscription')->whereNotNull('stripe_id')->count();
        $non = User::count();
        $non_abonne = $non - $abonne ;
        return view('dashboard.users')->with(compact('users', 'fb','google','linkedin','direct','abonne','non_abonne'));
    }





    public function showAllProfs()
    {
        $users = User::whereRoleIs('administrator')->paginate(5);
        $fb = User::whereRoleIs('administrator')->where('provider', 'facebook')->count();
        $google = User::whereRoleIs('administrator')->where('provider', 'google')->count();
        $linkedin = User::whereRoleIs('administrator')->where('provider', 'linkedin')->count();
        $direct = User::whereRoleIs('administrator')->where('provider', null)->count();
        $non = User::count();
        return view('dashboard.prof')->with(compact('users', 'fb','google','linkedin','direct','abonne','non_abonne'));
    }



    public function searchProfs(Request $request)
    {
//        $users = User::orderBy('id','desc')->paginate(5);
        $fb = User::whereRoleIs('administrator')->where('provider', 'facebook')->count();
        $google = User::whereRoleIs('administrator')->where('provider', 'google')->count();
        $linkedin = User::whereRoleIs('administrator')->where('provider', 'linkedin')->count();
        $direct = User::whereRoleIs('administrator')->where('provider', null)->count();
        $name = $request->search ;
        $search = User::with('subscription')->where('name', 'LIKE', "%$name%")->get();
        return view('dashboard.prof')->with(compact('users', 'fb','google','linkedin','direct','search','name','abonne','non_abonne'));


    }


    public function edit($id)
    {
        //
    }


    public function update(banRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->name != 'Superadministrator'){
        $user->banned_until =$request->dateBanner.' 00:00:00';
        $user->save();
            Alert::success('Suspendu', 'l\'utilisateur est Suspendu ');

            return back();

        }

        else{
            Alert::error('Erreur', 'Tu peux pas suspendu l\'admin ');
            return back();
        }
        return back();
    }


    public function unban(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($user->name != 'Superadministrator'){
            $user->banned_until = null;
            $user->save();
            Alert::success('Autorisé', 'l\'utilisateur a l\'accés  ');

            return back();

        }

        else{
            return redirect()->route('dashboard/users');
        }
        return redirect()->route('dashboard/users');
    }

    public function mettreProf($id){
        $user = User::findOrFail($id);
        $user->attachRole('administrator');
        Alert::success('Professeur', $user->name.' est devenu professeur');
        return back();
    }
    public function dettachProf($id){
        $user = User::findOrFail($id);
        $user->detachRole('administrator');
        Alert::success('Professeur', $user->name.' est devenu Utilisateur normal');
        return back();
    }

}
