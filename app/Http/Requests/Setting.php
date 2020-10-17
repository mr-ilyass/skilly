<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use RealRashid\SweetAlert\Facades\Alert;

class Setting extends FormRequest
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
            'username'=>'required|min:8|max:50',
            'newpass' =>'required|min:8|max:50|required_with:confNewpass|same:confNewpass',
            'confNewpass' =>'required|min:8|max:50',
            'password' => 'required|min:8|max:50'


        ];
    }
}
