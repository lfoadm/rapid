<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCandidateRequest extends StoreCandidateRequest
{
    

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules = parent::rules();
        $rules['name'] = [ 'required', 'max:255' ];
        $rules['surname'] = [ 'required', 'max:255' ];
        $rules['number'] = [ 'required', 'string', 'max:5' ];
        $rules['city_id'] = [ 'required' ];
        $rules['acronym'] = [ 'nullable' ];
        $rules['status'] = [ 'boolean' ];
        $rules['image'] = [ 'file', 'mimes:jpg,png,gif', 'max:3072' ];

        return $rules;
    }
}
