<?php

namespace App\Http\Requests\EmployeeRequests;

use App\DTO\EmployeeDTO\DeleteEmployeeDTO;
use App\DTO\Interfaces\DTOInterface;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class DeleteEmployeeRequest extends FormRequest implements DTOInterface
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
    public function getDTO(): DeleteEmployeeDTO
    {
        return new DeleteEmployeeDTO($this->validated());
    }
}
