<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'name' => 'nullable|string',
            'description' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'birth_place' => 'nullable|string',
            'education' => 'nullable|string',
            'height' => 'nullable|string',
            'status' => 'nullable|integer',
            'image' => 'nullable',
            'order_number' => 'nullable|numeric',
            'key_features' => 'nullable|array',
            'key_features.*.title' => 'nullable|string',
            'key_features.*.short_description' => 'nullable|string',
            'key_features.*.year' => 'nullable|string',
        ];
    }
}
