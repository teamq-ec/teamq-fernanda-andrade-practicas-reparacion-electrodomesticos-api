<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequestRequest extends FormRequest
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
            'appliance_type' =>['required'],
            'brand' =>['required'],
            'problem_details' =>['required'],
            'collection_address'=>['required'],
            'preferred_contact_method' =>['required'],
            'damaged_appliance_image' =>['required'],
            'application_date' =>['required'],
        ];
    }
}
