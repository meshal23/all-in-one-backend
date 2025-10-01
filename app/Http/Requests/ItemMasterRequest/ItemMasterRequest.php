<?php

namespace App\Http\Requests\ItemMasterRequest;

use Illuminate\Foundation\Http\FormRequest;

class ItemMasterRequest extends FormRequest
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
            'costPrice' => 'required',
            'retailPrice' => 'required'
        ];
    }

    /**
     * Function: messaages()
     * Description: add custom messages for validation error
     */
    public function messages()
    {
        return [
            'name.required' => 'Item name is required',
            'cost_price.required' => 'Cost price is required',
            'retail_price.required' => 'Retail price is required'
        ];
    }
}
