<?php

namespace App\Http\Requests\PositionRequests;

use App\DTO\Interfaces\DTOInterface;
use App\DTO\PositionDTO\PutPositionDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PutPositionRequest extends FormRequest implements DTOInterface
{
    public function rules(): array
    {
        return [
            'id'       => ['required', 'integer', 'exists:positions,id'],
            'position' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @throws UnknownProperties
     */
    public function getDTO(): PutPositionDTO
    {
        return new PutPositionDTO($this->validated());
    }
}
