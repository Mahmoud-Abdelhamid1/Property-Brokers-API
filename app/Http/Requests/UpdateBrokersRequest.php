<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrokersRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes','unique:brokers', 'max:255'],
            'address' => ['sometimes', 'max:255'],
            'city' => ['sometimes'],
            'zip_code' => ['sometimes'],
            'phone_number' => ['sometimes', 'numeric' , 'digits:11'],
            'logo_path' => ['sometimes']
        ];
    }
}
