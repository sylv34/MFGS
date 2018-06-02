<?php

namespace mfgs\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PasswordRequest extends FormRequest
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
            'pw' => 'required|string|min:6',
            'pw2' => 'required|string|min:6|same:pw'
        ];
    }
    public function messages(){
        return [
            'pw2.same' => 'Les mots de passe ne sont pas les même',
            'pw.min' => 'Le mot de passe doit être d\'au moins 6 caractères',
            'pw.required' => 'Aucun mot de passe entré'
        ];
    }
}
