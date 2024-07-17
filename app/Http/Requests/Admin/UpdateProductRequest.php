<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends StoreProductRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['title'] = [ 'required', 'max:255' ];
        $rules['city_id'] = [ 'required' ];
        $rules['status'] = [ 'boolean' ];

        return $rules;
    }
}
