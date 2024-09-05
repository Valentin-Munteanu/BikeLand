<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|min:3|max:100|regex:/^[a-zA-Z\s]+$/",
            "lastname" =>"required|min:3|max:100|regex:/^[a-zA-Z\s]+$/",
            'login' => 'required|unique:users,login',
            "email" => "required|unique:users,email",
            "password" => [
                "confirmed",
                "required",
                Password::min(8)->letters()->numbers()->symbols()
            ]
        ];
    }

    public function messages(){
return [
    "name.required" => "Numele este obligatoriu.",
    "name.min" => "Numele trebuie să aibă cel puțin 3 caractere.",
    "name.regex" => "Numele poate conține doar litere.",
    "name.max" => "Numele trebuie să aibă cel mult 100 caractere.",
    "lastname.required" => "Prenumele este obligatoriu.",
    "lastname.min" => "Prenumele trebuie să aibă cel puțin 3 caractere.",
    "lastname.regex" => "Prenumele poate conține doar litere.",
    "lastname.max" => "Prenumele trebuie să aibă cel mult 100 caractere.",
    "login.required" => "Loginul este obligatoriu.",
    "login.unique" => "Acest Login este deja utilizat.",
    "email.required" => "Email este obligatoriu.",
    "email.unique" => "Acest Email este deja înregistrat.",
    "password.required" => "Parola este obligatorie.",
    "password.confirmed" => "Confirmarea parolei nu se potrivește.",
    "password.min" => "Parola trebuie să aibă cel puțin :min caractere.",
    "password.letters" => "Parola trebuie să conțină litere.",
    "password.numbers" => "Parola trebuie să conțină cifre.",
    "password.symbols" => "Parola trebuie să conțină simboluri."

];
    }
}
