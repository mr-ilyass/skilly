<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Categories;
use App\Http\Requests\EditCategories;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }
    public function index()
    {
        $categories = Category::all();

        return view('dashboard.categories')->with(compact('categories'));
    }


    public function store(Categories $request )
    {
        $cat = new Category ;
        $cat->name = $request->name ;
        $cat->meta_keywords = $request->meta;
        $cat->meta_des =  $request->metadesc ;

        $cat->image  = $request->file('image')->store('categories');
        Alert::success('Enregistré', 'La catégorie est bien enregistré');

        $cat->save();
        return back();

    }



    public function update(EditCategories $request, $id)
    {

            $exist = null ;
            $cat = Category::findOrFail ($id);
            if($cat->name !=  $request->name ){
                $exist = Category::where('name',$request->name)->first();
                if (!$exist){
                    $cat->name =  $request->name;
                }

            }
            $cat->meta_keywords = $request->meta;
            $cat->meta_des =  $request->metadesc ;
        if($files = $request->file('image')){
            Storage::delete($cat->image);
            $cat->image  = $request->file('image')->store('categories');
            $cat->save();

        }
        if($exist){
        session()->flash('SOS','Le nom de catégorie :  '. $request->name .' déja utilisé !!');
            Alert::error('Erreur', 'Vérifier les modifications');

            return back();

        }
            $cat->save();
        Alert::success('Modifié', 'La catégorie est bien modifié');

        return back();

        }

    public function destroy(Request $request, $id){

        $cat = Category::findOrFail ($id);
        Storage::delete($cat->image);


        $cat->delete();
        Alert::success('Supprimé', 'La catégorie était bien supprimé');

        return back();

    }


}
