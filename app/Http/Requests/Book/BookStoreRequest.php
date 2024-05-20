<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'edition_year'=>'required|integer|digits:4|min:1400|max:' . date('Y'),
            'author_id'=>'required|exists:authors,id',
            'genre_ids' => 'required|array|min:1',
            'genre_ids.*' => 'exists:genres,id'
        ];
    }
}
