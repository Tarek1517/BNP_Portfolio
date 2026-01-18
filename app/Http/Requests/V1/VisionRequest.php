<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class VisionRequest extends FormRequest
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
            'description' => 'required|string',
            'image' => $this->isMethod('post')
                ? 'nullable|mimes:png,jpg,jpeg,webp,avif|max:2048'
                : 'sometimes|nullable|mimes:png,jpg,jpeg,webp,avif|max:2048',
            'order_number' => 'required|numeric',
            'key_features' => 'nullable|array',
            'key_features*name' => 'nullable|string',
        ];
    }
}
