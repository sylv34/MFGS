<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::User()->isAdmin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nom' => 'required|max:100',
            'prenom' => 'required|max:100',
            'email' => 'required|email|unique:users,email',
            'pw' => 'required|string|min:6',
            'pw2' => 'required|string|min:6|same:pw'
        ];
    }
    public function messages(){
        return [
            'nom.required' => 'Nom manquant',
            'prenom.required' => 'Prénom manquant',
            'email.required' => 'Email manquant',
            'email.unique' => 'Adresse mail déjà utilisée',
            'pw.required' => 'Mot de passe manquant',
            'pw2.same' =>'Les mots de passe ne sont pas les même',
            'pw.min' => 'Minimum 6 caractères pour les mots de passe'
        ];
    }
}
