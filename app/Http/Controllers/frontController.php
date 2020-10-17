<?php

namespace App\Http\Controllers;
use App\Comment;
use App\Course;
use App\Episode;
use App\Save;
use App\Subscription;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Newsletter;
use App\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class frontController extends Controller
{

    public function index(){
        $categories = Category::all();

        return view('Front.categories')->with(compact('categories'));
    }


    public function store(Request $request)
    {

        if ( ! Newsletter::isSubscribed($request->user_email) ) {
            Newsletter::subscribe($request->user_email);
        }
        Alert::success('Great', 'Your are subscribed !!');

        return back();
    }

    public function showCourse($id)
    {

        $category = Category::where('id',$id)->first();

        if ($category == null){
            abort(404);
        }
        $courses = Course::where('category_id',$id)->where('active',1)->paginate(12);

        $cours = Course::where('category_id',$id)->where('active',1)->first();
//        if ($cours == null){
//
//        }
        return view('Front.Courses')->with(compact('courses','category'));



    }

    public function showEps($id)
    {

        if ( Auth::check() && auth()->user()->hasRole(['abonne', 'superadministrator'])){
            $Eps = Episode::with('course')->where('course_id', $id)->orderBy('N_ep')->paginate(6);
            $Ept = Episode::with('course')->where('course_id', $id)->orderBy('N_ep')->first();

            if($Ept == null) {
                abort(404);
            };

        return view('Front.episode')->with(compact('Eps','Ept'));}

        else
              return view('Front.pricing');



    }



    public function showEp($id)
    {

        if ( Auth::check() && auth()->user()->hasRole(['abonne', 'superadministrator']))
        {
            $ep = Episode::where('id',$id)->first();
            if ($ep == null) {
                abort(404) ;
            }
            $suivent = Episode::where('course_id',$ep->course_id)->where('N_Ep',$ep->N_Ep+1)->first();
            $precedent = Episode::where('course_id',$ep->course_id)->where('N_Ep',$ep->N_Ep-1)->first();
            $course = Course::where('id',$ep->course_id)->first();
            $banner = Episode::where('course_id',$ep->course_id)->where('N_Ep','>',$ep->N_Ep)->orderBy('N_ep')->take(3)->get();
            $cat = Category::where('id',$course->category_id)->first();

            $others = Course::where('category_id',$cat->id)->where('id','!=',$course->id)->orderBy('id','desc')->take(4)->get();
            $comments = Comment::where('epID',$id)->with('user')->orderBy('id','desc')->take(4)->get();
            return view('Front.entrollEP')->with(compact('ep','course','precedent','suivent','banner','cat','id','others','comments'));
        }

        else
            return view('Front.pricing');



    }

    public function resetPassword(){
        return view('front.forgotPass');
    }

    public function saveEpisode($id)
    {

        if ( Auth::check() && auth()->user()->hasRole(['abonne', 'superadministrator']))
        {


        $ep = Episode::findOrFail($id);
        if ($ep == null){
            abort(404);
        }

        $checkSave = Save::where('user_id',Auth::user()->id)->where('course_id',$ep->course_id)->first();
        if ($checkSave == null){
            $save = new Save;
            $save->user_id = Auth::user()->id ;
            $save->episodes_id = $ep->id ;
            $save->course_id = $ep->course_id ;
            $save->save();
            Alert::success('Enregistré', 'Votre avancement est enregistré ');
            return back();
        }
        else{
            $oldEP = Episode::where('id',$checkSave->episodes_id)->first();
            if ($oldEP->N_Ep == $ep->N_Ep){
                Alert::info('Merci', 'Vous avez deja enregistré votre avancement');
                return back();
            }
            elseif ($oldEP->N_Ep > $ep->N_Ep){
                Alert::info('Oops', 'Vous avez deja dépasser cette épisode');
                return back();
            }
            elseif ($oldEP->N_Ep < $ep->N_Ep){
                $checkSave->episodes_id = $ep->id ;
                $checkSave->course_id = $ep->course_id ;
                $checkSave->save();
                Alert::success('Enregistré', 'Votre avancement est enregistré ');
                return back();
            }
        }
    }
    }

    public function profile()
    {
        if ( Auth::check() && auth()->user()->hasRole(['abonne', 'superadministrator']))
        {
            $name = Auth::user()->name ;
            $image = $picture =  Auth::user()->provider_id.".jpg" ;
            $course = $users = DB::table('saves')->where('user_id',Auth::user()->id)
                ->join('courses', 'courses.id', '=', 'saves.course_id')->get();

            $abonnement = Subscription::where('user_id',Auth::user()->id)->select('stripe_plan','created_at')->first();
            return view('front.profile')->with(compact('name','image','course','abonnement'));
        }
    }

    public function cancelPayment(){
        if ( Auth::check() && auth()->user()->hasRole(['abonne', 'superadministrator']))
        {
            $name = Auth::user()->name ;
            $user = User::where('id',Auth::user()->id)->first();
            $user->detachRole('abonne');
            Alert::info('Enregistré', 'Vous avez arreter votre abonnement ');
            return view('welcome');
        }

        return abort(404);
    }

}
