<?php

namespace App\DTO\Interfaces;

use Spatie\DataTransferObject\DataTransferObject;

interface DTOInterface
{
    public function getDTO(): DataTransferObject;
}