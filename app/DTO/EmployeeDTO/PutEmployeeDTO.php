<?php

namespace App\DTO\EmployeeDTO;


use Spatie\DataTransferObject\DataTransferObject;

class PutEmployeeDTO extends DataTransferObject
{
    public int $id;
    public ?string $name;
    public string $position_id;
    public ?string $email;
    public ?string $phone;
    public ?float $salary;
    public ?string $headmen;

}