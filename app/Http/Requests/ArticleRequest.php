<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'judul' => ['required','string'],
            'publikasi' => ['required','date'],
            'description' => ['required','string'],
            'image' => ['required','image'],
            'category_id' => ['required','integer','exists:categories,id'],
            'author_id' => ['required','integer','exists:authors,id'],
        ];
    }
}
