<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
            'OwnerName' => ['required'],
            'OwnerCity' => ['required'],
            'departement' => ['required'],
            'tel' => ['required', 'max:8'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:12', 'confirmed'],
            'status' => ['required'],
        ];
    }
}
