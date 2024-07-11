<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCandidateRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'number' => ['required', 'string', 'max:5'],
            'city_id' => ['required'],
            'acronym' => ['nullable', 'string', 'max:191'],
            'status' => ['boolean'],
            'image' => ['file', 'mimes:jpg,png,gif', 'max:3072'],
        ];
    }
}
