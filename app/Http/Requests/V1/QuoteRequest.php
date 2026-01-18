<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class QuoteRequest extends FormRequest
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
            'title' => 'required|string',
            'sub_title' => 'required|string',
            'image' => 'nullable',
            'order_number' => 'required|numeric',
            'key_features' => 'nullable|array',
            'key_features*quote' => 'nullable|string',
            'key_features*year' => 'nullable|string',
            'key_features*tag' => 'nullable|string',
        ];
    }
}
