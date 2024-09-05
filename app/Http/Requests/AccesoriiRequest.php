<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccesoriiRequest extends FormRequest
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
            "image" => "image|required",
            "type_acces" => "required|min:3",
           "name_acces" => "required|min:3",
           "color_acces" => "required|min:3|string",
          "price" => "required|min:2",
            "description" => "required|min:3",
        ];
    }

    public function messages(){
        return [
            "image.required" => "Imaginea este obligatorie.",
            "image.image" => "Fişierul încărcat trebuie să fie o imagine.",
            "type_acces.required" => "Tipul accesoriului este obligatoriu.",
            "type_acces.min" => "Tipul accesoriului trebuie să aibă cel puţin 3 caractere.",
            "name_acces.required" => "Numele accesoriului este obligatoriu.",
            "name_acces.min" => "Numele accesoriului trebuie să aibă cel puţin 3 caractere.",
            "color_acces.required" => "Culoarea accesoriului este obligatorie.",
            "color_acces.min" => "Culoarea accesoriului trebuie să aibă cel puţin 3 caractere.",
            "color_acces.string" => "Culoarea accesoriului trebuie să fie un şir de caractere.",
            "price.required" => "Preţul este obligatoriu.",
            "price.min" => "Preţul trebuie să aibă cel puţin 2 caractere.",
            "description.required" => "Descrierea este obligatorie.",
            "description.min" => "Descrierea trebuie să aibă cel puţin :min caractere.",
        ];
    }
}
