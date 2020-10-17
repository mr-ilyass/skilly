<?php

namespace App\Http\Controllers;

use App\Course;
use App\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class professorEpisodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator|administrator');
    }
    public function index($id)
    {
        $Course = Course::where('creatorCourse',Auth::user()->id)->where('id',$id)->first();
        if($Course == null){
            abort(404);
        }
        $Eps = Episode::where('creatorEp',Auth::user()->id)->where('course_id', $id)->orderBy('N_ep')->get();

        return view('profDashboard.episode.index')->with(compact('Eps','id'));

    }

    public function store(Request $request , $id)
    {
        $course = Course::where('creatorCourse',Auth::user()->id)->where('id',$id)->first();
        if($course == null){
            abort(404);
        }

        $ep = new Episode ;
        $ep->N_Ep = $request->ep ;
        $ep->ep_name = $request->titre;
        $ep->ep_description =$request->desc;
        $ep->ep_video = $request->video;
        $ep->creatorEp = Auth::user()->id ;


        $ep->course()->associate($course)->save();
        Alert::success('Enregistré', 'L\'episode est bien enregistré');


        return back();

    }
    public function update(Request $request , $id)
    {

        $ep = Episode::where('creatorEp',Auth::user()->id)->where('id',$id)->first() ;
        if ($ep == null){
            abort(404);
        }
        $ep->N_Ep = $request->ep ;
        $ep->ep_name = $request->titre;
        $ep->ep_description =$request->desc;
        $ep->ep_video = $request->video;

        $ep->save();
        Alert::success('Enregistré', 'L\'episode est bien modifié');

        return back();

    }


    public function destroy($id)
    {
        $ep = Episode::where('creatorEp',Auth::user()->id)->where('id',$id)->first() ;
        if ($ep == null){
            abort(404);
        }
        $ep->delete() ;
        return back();
    }

}
