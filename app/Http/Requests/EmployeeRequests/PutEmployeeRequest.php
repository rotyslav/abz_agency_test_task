<?php

namespace App\Http\Requests\EmployeeRequests;

use Illuminate\Foundation\Http\FormRequest;

class PuEmployeeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id'       => ['required', 'integer', 'exists:employees,id'],
            'name'     => ['required'],
            'position' => ['required'],
            'email'    => ['required'],
            'phone'    => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
