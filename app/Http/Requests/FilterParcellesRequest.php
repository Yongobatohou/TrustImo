<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterParcellesRequest extends FormRequest
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
            'ptitle' => ['string', 'nullable'],
            'pville' => ['string', 'nullable'],
            'psurface' => ['numeric', 'gte:0', 'nullable'],
            'pmax' => ['numeric', 'gte:0', 'nullable'],
        ];
    }
}
