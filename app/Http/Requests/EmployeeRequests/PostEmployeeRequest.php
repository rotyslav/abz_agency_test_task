<?php

namespace App\Http\Requests\EmployeeRequests;

use App\DTO\EmployeeDTO\PostEmployeeDTO;
use App\DTO\Interfaces\DTOInterface;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostEmployeeRequest extends FormRequest implements DTOInterface
{
    public function rules(): array
    {
        return [
            'name'               => ['required', 'min:2', 'max:255'],
            'position_id'        => ['required'],
            'email'              => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'phone'              => ['required'],
            'salary'             => ['required', 'numeric', 'min:100'],
            'headmen'            => ['required', 'string', 'max:256', 'exists:employees,name'],
            'date_of_employment' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'headmen.exist' => 'Selected headmen does not exist.',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @throws UnknownProperties
     */
    public function getDTO(): PostEmployeeDTO
    {
        return new PostEmployeeDTO($this->validated());
    }
}
