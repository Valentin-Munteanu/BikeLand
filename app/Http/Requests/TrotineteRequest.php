<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrotineteRequest extends FormRequest
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
            "speed_trt"=> "required|min:2",
            "image" => "required|image",
            "name_trt" => "required|min:3",
            "color_trt" => "required|min:3" ,
            "price_trt" => "required|min:3",
         "description" => "required|min:3",
        ];
    }

    public function messages()
{
    return [
        'speed_trt.required' => 'Câmpul viteză trotinetă este obligatoriu.',
        'speed_trt.min' => 'Câmpul viteză trotinetă trebuie să conțină cel puțin 3 caractere.',

        'image.required' => 'Câmpul imagine trotinetă este obligatoriu.',
        'image.image' => 'Câmpul imagine trotinetă trebuie să fie o imagine validă.',

        'name_trt.required' => 'Câmpul nume trotinetă este obligatoriu.',
        'name_trt.min' => 'Câmpul nume trotinetă trebuie să conțină cel puțin 3 caractere.',

        'color_trt.required' => 'Câmpul culoare trotinetă este obligatoriu.',
        'color_trt.min' => 'Câmpul culoare trotinetă trebuie să conțină cel puțin 3 caractere.',

        'price_trt.required' => 'Câmpul preț trotinetă este obligatoriu.',
        'price_trt.min' => 'Câmpul preț trotinetă trebuie să conțină cel puțin 3 caractere.',

        'description.required' => 'Câmpul descriere trotinetă este obligatoriu.',
        'description.min' => 'Câmpul descriere trotinetă trebuie să conțină cel puțin 3 caractere.',
    ];
}}
