<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterPropertiesRequest extends FormRequest
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
            'title' => ['string', 'nullable'],
            'city' => ['string', 'nullable'],
            'surface' => ['numeric', 'gte:0', 'nullable'],
            'price' => ['numeric', 'gte:0', 'nullable'],
            'type' => ['string', 'nullable'],
            'operation' => ['string', 'nullable'],
        ];
    }
}
