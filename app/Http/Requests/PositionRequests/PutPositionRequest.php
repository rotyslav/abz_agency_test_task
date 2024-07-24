<?php

namespace App\Http\Requests\PositionRequests;

use Illuminate\Foundation\Http\FormRequest;

class PutPositionRequest extends FormRequest{
    public function rules(): array
    {
        return [
            //
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
