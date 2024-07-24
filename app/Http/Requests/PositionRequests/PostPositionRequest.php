<?php

namespace App\Http\Requests\PositionRequests;

use App\DTO\Interfaces\DTOInterface;
use App\DTO\PositionDTO\PostPositionDTO;
use Illuminate\Foundation\Http\FormRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class PostPositionRequest extends FormRequest implements DTOInterface
{
    public function rules(): array
    {
        return [
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
    public function getDTO(): PostPositionDTO
    {
        return new PostPositionDTO($this->validated());
    }
}
