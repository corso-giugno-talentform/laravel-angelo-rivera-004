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
            'title' => ['required', 'string', 'max:100'],
            'release_year' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
            'duration' => ['nullable', 'integer'],
            'genre' => ['nullable', 'string'],
            'cover' => ['nullable', 'mimes:jpg,jpeg,bmp,png,gif', 'max:2048'], // max 2MB
        ];
    }
}
