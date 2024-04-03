<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookUpdateRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'edition_year'=>'required|integer|digits:4|min:1900|max:' . date('Y'),
            'author_id'=>'required|exists:authors,id'
        ];

        if ($this->isMethod('patch')) {
            $rules = [
                'name' => 'sometimes|string|max:255',
                'description' => 'sometimes|string|max:255',
                'edition_year' => 'sometimes|integer|digits:4|min:1900|max:' . date('Y'),
                'author_id' => 'sometimes|exists:authors,id',
            ];
        }

        return $rules;
    }
}
