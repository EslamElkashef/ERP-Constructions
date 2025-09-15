<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
 public function rules(): array
    {
        $employeeId = $this->route('employee')?->id;

        return [
            'name'            => 'required|string|max:255',
            'email'           => 'required|email|unique:employees,email,' . $employeeId,
            'phone'           => 'required|numeric',
            'address'         => 'required|string|max:255',
            'personal_image'  => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'national_id'     => 'required|numeric',
            'national_id_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'birthday'        => 'required|date',
            'position'        => 'required|string|max:255',
            'salary'          => 'nullable|numeric',
            'start_date'      => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Name Required',
            'email.required' => 'Email Required',
            'email.unique'   => 'This Email Is Exist',
            'phone.required' => 'Phone Required',
            'personal_image.image' => 'Image Has Be Clear',
        ];
    }
}
