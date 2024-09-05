<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BikesRequest extends FormRequest
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
            "image_bike"=> "required|image",
            "name_bike"=> "required|min:3",
            "type_bike"=> "required|min:3",
             "color_bike"=> "required|min:3",
            "price"=> "required|min:3",
            "description"=> "required|min:3",
        ];
    }

    public function messages(){

            return [
                'image_bike.required' => 'Imaginea bicicletei este obligatorie.',
                'image_bike.image' => 'Fișierul selectat trebuie să fie o imagine validă.',

                'name_bike.required' => 'Numele bicicletei este obligatoriu.',
                'name_bike.min' => 'Numele bicicletei trebuie să conțină cel puțin 3 caractere.',

                'type_bike.required' => 'Numele bicicletei este obligatoriu.',
                'type_bike.min' => 'Numele bicicletei trebuie să conțină cel puțin 3 caractere.',

                'color_bike.required' => 'Culoarea bicicletei este obligatorie.',
                'color_bike.min' => 'Culoarea bicicletei trebuie să conțină cel puțin 3 caractere.',

                'price.required' => 'Prețul bicicletei este obligatoriu.',
                'price.min' => 'Prețul bicicletei trebuie să conțină cel puțin 3 caractere.',

                'description.required' => 'Descrierea bicicletei este obligatorie.',
                'description.min' => 'Descrierea bicicletei trebuie să conțină cel puțin 3 caractere.',

            ];
    }
}
