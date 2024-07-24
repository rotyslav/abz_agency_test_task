<?php

namespace App\DTO\EmployeeDTO;

use Spatie\DataTransferObject\DataTransferObject;

class PostEmployeeDTO extends DataTransferObject
{
    public string $name;
    public string $email;
    public string $position_id;
    public string $phone;
    public float $salary;
    public ?string $headmen;
    public string $date_of_employment;
}