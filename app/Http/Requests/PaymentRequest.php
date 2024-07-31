<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'user_id' =>['required'],
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone_number' => 'required|string|max:20',
            'card_type' => 'required|string|max:50',
            'card_number' => 'required|string|max:20',
            'security_code' => 'required|string|max:4',
            'amount_payable' => 'required|numeric|min:0',
            'product_id' =>['required'],
        ];
    }
}
