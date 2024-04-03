<?php

namespace App\Http\Requests\Record;

use Illuminate\Foundation\Http\FormRequest;

class RecordUpdateRequest extends FormRequest
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
            'loan_date'=>'required|date',
            'return_date'=>'required|date',
            'user_id'=>'required|integer|exists:',
            'copy_ids' =>'required|array|min:1',
            'copy_ids.*' =>'required|exists:copies,id',
        ];

        if($this->isMethod('patch')){
            $rules = [
                'loan_date'=>'sometimes|date',
                'return_date'=>'sometimes|date',
                'user_id'=>'sometimes|integer',
                'copy_ids' =>'sometimes|array|min:1',
                'copy_ids.*' =>'sometimes|exists:copies,id'
            ];
        }
    }
}
