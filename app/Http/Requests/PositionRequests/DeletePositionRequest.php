<?php

namespace App\Http\Requests\PositionRequests;

use Illuminate\Foundation\Http\FormRequest;

class DeltePositionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:positions,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
