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
<<<<<<< Updated upstream
            'user_id' =>['required'],
            'appliance_type' =>['required'],
            'brand' =>['required'],
            'problem_details' =>['required'],
            'collection_address'=>['required'],
            'service_type' =>['required'],
            'preferred_contact_method' =>['required'],
            'damaged_appliance_image' =>['required'],
            'application_date' =>['required'],
=======
            'user_id' => 'required|exists:users,id',
            'appliance_type' => 'required|string|max:255',
            'brand' => 'required|string|min:2|max:50',
            'problem_details' => 'required|string|min:5',
            'collection_address' => 'required|string|min:5|max:100',
            'service_type' => 'required|string',
            'preferred_contact_method' => 'required|string',
            'phone_number' => 'nullable|string',
            'damaged_appliance_image' => 'nullable|image|mimes:jpeg,png|max:10240',
            'state' => 'nullable|string|max:50',
            'application_date' => 'nullable|date',
>>>>>>> Stashed changes
        ];
    }
}
