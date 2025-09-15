<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'phone' => 'nullable|digits_between:6,15',
            'address' => 'nullable|string|max:255',
            'type' => 'required|in:company,personal',
            'notes'   => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'The client name is required.',
            'name.string'    => 'The client name must be a valid string.',
            'name.max'       => 'The client name may not be greater than 255 characters.',

            'phone.string'   => 'The phone number must be a valid string.',
            'phone.max'      => 'The phone number may not be greater than 255 characters.',

            'address.string' => 'The address must be a valid string.',
            'address.max'    => 'The address may not be greater than 255 characters.',

            'type.in'        => 'The type must be either "company" or "personal".',

            'notes.string'   => 'The notes must be a valid string.',
        ];
    }
}
