<?php

namespace App\Http\Requests\EmployeeRequests;

use App\DTO\EmployeeDTO\PutEmployeeDTO;
use App\DTO\Interfaces\DTOInterface;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PutEmployeeRequest extends FormRequest implements DTOInterface
{
    public function rules(): array
    {
        return [
            'id'          => ['required', 'integer', 'exists:employees,id'],
            'name'        => ['nullable', 'min:2', 'max:255'],
            'position_id' => ['nullable'],
            'email'       => ['nullable', 'string', 'email', 'max:255', 'unique:employees,email, '.$this->id],
            'phone'       => ['nullable'],
            'salary'      => ['nullable', 'numeric', 'min:100'],
            'headmen'     => ['nullable', 'string', 'max:256', 'exists:employees,name'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @throws UnknownProperties
     */
    public function getDTO(): PutEmployeeDTO
    {
        return new PutEmployeeDTO($this->validated());
    }
}
