<?php

namespace App\Http\Requests\ProductRequests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ];
    }

    /**
     * Function: messages - already inbuilt
     * Description: this fuction will overrirde the default validation error messages
     *      "This field is required" will get overridden by below messages
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter name of the product',
            'description.required' => 'Please enter description of the product',
            'price.required' => 'Please enter price of the product'
        ];
    }
}
