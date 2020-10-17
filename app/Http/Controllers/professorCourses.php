<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\EditCourseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class professorCourses extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator|administrator');
    }



    public function index()
    {
        $courses = DB::table('courses')
            ->where('creatorCourse',Auth::user()->id)
            ->join('categories', 'categories.id', '=', 'courses.category_id')
            ->select('courses.id as id','courses.name as name','courses.image as image', 'courses.active as active'
                ,'courses.level as level','categories.name as categorie')
            ->paginate(5);

        return view('profDashboard.course.showedit')->with(compact('courses'));

    }

    public function indexSearch(Request $request)
    {
        $name = $request->search ;
        $search = Course::where('creatorCourse',Auth::user()->id)->where('name', 'LIKE', "%$name%")->paginate(5);

        return view('profDashboard.course.showedit')->with(compact('courses','search'));

    }

    public function create()
    {

        $categories = Category::all();
        return view('profDashboard.course.create')->with(compact('categories'));
    }


    public function store(CreateCourseRequest $request)
    {
        $course = new Course ;
        $course->name = $request->name ;
        $course->meta_key = $request->keywords ;
        $course->meta_desc = $request->Metadescription ;
        $course->description = $request->description ;
        $course->overview = $request->video ;
        $course->image  = $request->file('image')->store('courses');
        $course->level = $request->niveau ;
        $course->creatorCourse = Auth::user()->id ;
        if(!empty($request->activer)){

            $course->active = 1 ;
        }
        else{
            $course->active = 0 ;
        }
        $cat = Category::findOrFail($request->categorie);
        $course->category()->associate($cat)->save() ;
        Alert::success('Enregistré', 'Le cours est bien enregistré');
        return back() ;

    }





    public function edit($id)
    {

        $cours = Course::where('creatorCourse',Auth::user()->id)->where('id',$id)->first();
        if ($cours == null){
            abort(404);
        }
        $categories = Category::all();
        return view('profDashboard.course.edit')->with(compact('categories','cours'));
    }


    public function update(EditCourseRequest $request, $id)
    {


        $course = Course::where('creatorCourse',Auth::user()->id)->where('id',$id)->first();
        if ($course == null){
            abort(404);
        }
        $course->name = $request->name ;
        $course->meta_key = $request->keywords ;
        $course->meta_desc = $request->Metadescription ;
        $course->description = $request->description ;
        $course->overview = $request->video ;

        if($files = $request->file('image')){
            Storage::delete($course->image);
            $course->image  = $request->file('image')->store('categories');
            $course->save();

        }

        $course->level = $request->niveau ;
        if(!empty($request->activer)){
            $course->active = 1 ;
        }
        else{
            $course->active = 0 ;
        }

        $cat = Category::findOrFail($request->categorie);

        $course->category()->associate($cat)->save() ;
        Alert::success('Enregistré', 'Le cours est bien modifié');
        return back() ;




    }


    public function destroy($id)
    {
        $course = Course::where('creatorCourse',Auth::user()->id)->where('id',$id)->first();
        if ($course == null){
            abort(404);
        }
        $course->delete() ;
        return back();
    }





}
