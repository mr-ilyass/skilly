<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class CreateCourseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        Alert::error('Erreur', 'Vérifier l\'insertion des données');

        return [
            'name'=>'required|max:50|min:2',
            'keywords' =>'max:200|string',
            'Metadescription' =>'max:200|string',
            'description' =>'string',
            'video' =>'max:20|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'niveau' =>'required|max:20|string',
            'categorie' =>'required',


        ];
    }
}
