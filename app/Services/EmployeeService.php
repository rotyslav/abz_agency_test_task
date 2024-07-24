<?php

namespace App\Services;

use App\DTO\EmployeeDTO\DeleteEmployeeDTO;
use App\DTO\EmployeeDTO\PostEmployeeDTO;
use App\DTO\EmployeeDTO\PutEmployeeDTO;
use App\Models\Employee;

class EmployeeService
{
    public function createEmployee(PostEmployeeDTO $dataTransferObject): void
    {
        $headmen = Employee::firstWhere('name', $dataTransferObject->headmen);

        Employee::create([
            'name'               => $dataTransferObject->name,
            'email'              => $dataTransferObject->email,
            'phone'              => $dataTransferObject->phone,
            'position_id'        => $dataTransferObject->position_id,
            'salary'             => $dataTransferObject->salary,
            'date_of_employment' => $dataTransferObject->date_of_employment,
            'headmen_id'         => isset($headmen->id) ? $headmen->id : null,
        ]);
    }

    public function getByID(string $id): Employee
    {
        return Employee::find($id);
    }

    public function updateEmployee(PutEmployeeDTO $dataTransferObject): void
    {
        $employee = $this->getByID($dataTransferObject->id);
        $employee->update($dataTransferObject->toArray());
    }

    public function deleteEmployee(DeleteEmployeeDTO $dataTransferObject): void
    {
        $recedingEmployee = $this->getByID($dataTransferObject->id);
        $employees        = $recedingEmployee->employees;
        foreach ($employees as $employee) {
            $newHeadmen = Employee::where('position_id', '=', $recedingEmployee->position->id)
                ->where('id', '!=', $employee->id)
                ->where('id', '!=', $recedingEmployee->id)->first();
            $employee->update(['headmen_id' => $newHeadmen->id]);
        }
        $recedingEmployee->delete();
    }
}