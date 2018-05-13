<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class NoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        
         
                    return Auth::User()->isCadre();

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titre' => 'required|max:100',
            'note' => 'required|file|mimes:pdf|max:10000',
        ];
    }
    public function messages(){
        return [
            'titre.required' => 'Titre manquant',
            'titre.max' => 'Trop de caractère. Max : 100 caractères',
            'note.required' => 'Fichier manquant',
            'note.file' => "Type pdf uniquement",
            'note.mimes' => "Type pdf uniquement",
            'note.max' => "Fichier trop lourd",
        ];
    }
}
