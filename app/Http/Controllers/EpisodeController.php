<?php

namespace App\Http\Controllers;

use App\Course;
use App\Episode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class EpisodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    public function index($id)
    {
        $Course = Course::findOrFail($id);

        $Eps = Episode::where('course_id', $id)->orderBy('N_ep')->get();

        return view('dashboard.episode.index')->with(compact('Eps','id'));

    }

    public function store(Request $request , $id)
    {

        $ep = new Episode ;
        $ep->N_Ep = $request->ep ;
        $ep->ep_name = $request->titre;
        $ep->ep_description =$request->desc;
        $ep->ep_video = $request->video;
        $ep->creatorEp = Auth::user()->id ;

        $course = Course::findOrFail($id);

        $ep->course()->associate($course)->save();
        Alert::success('Enregistré', 'L\'episode est bien enregistré');


        return back();

    }
    public function update(Request $request , $id)
    {

        $ep = Episode::findOrFail($id) ;
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
        $course = Episode::findOrfail($id) ;
        $course->delete() ;
        return back();
    }



}
