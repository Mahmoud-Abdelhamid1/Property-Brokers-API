<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'address' =>['sometimes'],
            'listing_type' => ['sometimes'],
            'city' =>['sometimes'],
            'zip_code' => ['sometimes'],
            'description' => ['sometimes'],
            'build_year' => ['sometimes' , 'digits:4'],
            'price' =>['sometimes'],
            'bedrooms' => ['sometimes'],
            'bathrooms' =>['sometimes'],
            'sqft' => ['sometimes'],
            'price_sqft' => ['sometimes'],
            'property_type' => ['sometimes'],
            'status' => ['sometimes'],
        ];
    }
}
