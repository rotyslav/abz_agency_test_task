<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'position' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
