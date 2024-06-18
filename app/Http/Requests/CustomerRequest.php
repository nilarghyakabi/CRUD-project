<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', function ($attribute, $value, $fail) {
                if (strlen($value) < 3) $fail("Name should be more 3 chars");
            }
            ],
            'phone' => ['required', 'max_digits:10'],
            'address' => ['required'],
            'user_id'=>['required','max_digits:10'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Customer name is required',
            'phone.required' => 'Phone number is required',
            'address.required' => 'Address cost is required',
        ];
    }
}
