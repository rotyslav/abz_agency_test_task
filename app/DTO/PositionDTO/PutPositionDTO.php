<?php

namespace App\DTO\PositionDTO;

use Spatie\DataTransferObject\DataTransferObject;

class PutPositionDTO extends DataTransferObject
{
    public int $id;
    public string $position;
}