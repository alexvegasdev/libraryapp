<?php

namespace App\Http\Requests\Loan;

use Illuminate\Foundation\Http\FormRequest;

class LoanStoreRequest extends FormRequest
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
            'status_id'=>'required',
            'loan_date'=>'required',
            'return_date'=>'required',
            'user_id'=>'required|integer|exists:users,id',
            'copy_ids' => 'required|array|min:1',
            'copy_ids.*' => 'exists:copies,id',
        ];
    }
}
