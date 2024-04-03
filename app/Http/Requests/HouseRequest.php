<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
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
            'name' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'surface' => ['required'],
            'ville' => ['required'],
            'quartier' => ['required'],
            'loyé' => ['required'],
            'avance' => ['required'],
            'rooms' => ['required'],
            'bedrooms' => ['required'],
            'options' => ['array', 'exists:house_options,id', 'required']
        ];
    }
}
