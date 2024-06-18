<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required',function ($attribute, $value, $fail) {
                if(strlen($value) < 3) $fail("String should be more then 3 characters");
            }],
            'cost' => ['required','numeric','min:0','max:100000'] ,
            'sale'=>['required','numeric','min:0','max:100000'] ,
            'status'=>['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Product name is required',
            'cost.required' => 'Product cost is required',
            'sale.required' => 'Product selling cost is required',
            'status.required' => 'Product status is required',
        ];
    }
}

