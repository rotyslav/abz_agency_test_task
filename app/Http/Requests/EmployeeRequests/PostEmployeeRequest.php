<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'     => ['required', 'min:2', 'max:255'],
            'position' => ['required'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'phone'    => ['required'],
            'salary'   => ['required', 'numeric', 'min:100'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
