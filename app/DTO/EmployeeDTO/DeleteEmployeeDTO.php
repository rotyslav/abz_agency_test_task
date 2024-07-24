<?php

namespace App\DTO\EmployeeDTO;

use Spatie\DataTransferObject\DataTransferObject;

class DeleteEmployeeDTO extends DataTransferObject
{
    public string $id;
}