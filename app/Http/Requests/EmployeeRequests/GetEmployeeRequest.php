<?php

namespace App\Http\Requests\EmployeeRequests;

use App\DTO\EmployeeDTO\GetEmployeeDTO;
use App\DTO\Interfaces\DTOInterface;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class GetEmployeeRequest extends FormRequest implements DTOInterface
{
    public function rules(): array
    {
        return [
            'id' => ['required', 'integer', 'exists:employees,id'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @throws UnknownProperties
     */
    public function getDTO(): GetEmployeeDTO
    {
        return new GetEmployeeDTO($this->validated());
    }
}
