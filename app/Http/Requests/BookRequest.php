<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class BookRequest extends FormRequest
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
            'isbn' => 'required|string',
            'title' => 'required|string',
            'description' => 'nullable',
            'publisher' => 'required|string',
            'author' => 'required|string',
            'language' => 'nullable',
            'stock' => 'integer',
            'published_at' => 'required|date',
        ];
    }

    public function prepareForValidation(): void
    {
        if (!isset($this->uuid) || empty($this->uuid))
        {
            $this->merge([
                'uuid' => Str::uuid(),
            ]);
        }
    }
}
