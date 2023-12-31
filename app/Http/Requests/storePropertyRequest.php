<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storePropertyRequest extends FormRequest
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
            'address' =>['required'],
            'listing_type' => ['required'],
            'city' =>['required'],
            'zip_code' => ['required'],
            'description' => ['required'],
            'build_year' => ['required' , 'digits:4'],
            'price' =>['required'],
            'bedrooms' => ['required'],
            'bathrooms' =>['required'],
            'sqft' => ['required'],
            'price_sqft' => ['required'],
            'property_type' => ['required'],
            'status' => ['required'],
        ];
    }
}
