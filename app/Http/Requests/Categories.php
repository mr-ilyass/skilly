<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class Categories extends FormRequest
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
    {        Alert::error('Erreur', 'Vérifier l\'insertion des données');

        return [
            'name'=>'required|unique:categories',
            'meta' =>'max:200|string',
            'metadesc' =>'max:200|string',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'


        ];
    }
}
