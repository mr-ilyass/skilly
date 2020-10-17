<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class EditCourseRequest extends FormRequest
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
    {        Alert::error('Erreur', 'Vérifier la modification des données');

        return [
            'name'=>'required',
            'keywords' =>'max:200|string',
            'Metadescription' =>'max:200|string',
            'description' =>'string',
            'video' =>'max:20|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'niveau' =>'required|max:20|string',
            'categorie' =>'required',


        ];
    }
}
