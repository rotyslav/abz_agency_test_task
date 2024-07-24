<?php

namespace App\Http\Requests\PositionRequests;

use App\DTO\Interfaces\DTOInterface;
use App\DTO\PositionDTO\GetPositionDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class GetPositionRequest extends FormRequest implements DTOInterface
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

    /**
     * @throws UnknownProperties
     */
    public function getDTO(): GetPositionDTO
    {
        return new GetPositionDTO($this->validated());
    }
}
