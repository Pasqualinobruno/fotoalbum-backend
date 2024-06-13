<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePhotographyRequest extends FormRequest
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
            'name' => 'required|min:4|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:3000',
            'description' => 'nullable|string|max:500',
            'upload_image' => 'nullable|date',
            'evidence' => 'nullable|boolean',
            'city' => 'nullable|string|max:100',
            'category' => 'nullable'

        ];
    }
}
