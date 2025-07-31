<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100'],
            'year' => ['nullable', 'integer'],
            'desc' => ['nullable', 'string'],
            'duration' => ['nullable', 'integer'],
            'image' => ['nullable', 'mimes:jpg,jpeg,bmp,png,gif', 'max:2048'], // max 2MB
        ];
    }
}
