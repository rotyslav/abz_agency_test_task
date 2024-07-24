<?php

namespace App\Http\Controllers;

use App\DataTables\EmployeesDataTable;
use App\Http\Requests\EmployeeRequests\DeleteEmployeeRequest;
use App\Http\Requests\EmployeeRequests\GetEmployeeRequest;
use App\Http\Requests\EmployeeRequests\PostEmployeeRequest;
use App\Http\Requests\EmployeeRequests\PutEmployeeRequest;
use App\Models\Employee;
use App\Models\Position;
use App\Models\User;
use App\Services\EmployeeService;
use App\Services\PositionService;
use Illuminate\Support\Collection;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{
    public function __construct(
        readonly private EmployeeService $service
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(EmployeesDataTable $dataTable)
    {
        $data = Employee::all();

        return $dataTable->render('employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PositionService $positionService)
    {


        return view('employee.create', ['positions' => $positionService->getAllPositions()]);
    }

    /**
     * Store a newly created resource in storage.
     * @throws UnknownProperties
     */
    public function store(PostEmployeeRequest $request)
    {

        $this->service->createEmployee($request->getDTO());

        return redirect()->route('employee.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @throws UnknownProperties
     */
    public function edit(GetEmployeeRequest $request)
    {
        $employee = $this->service->getByID($request->getDTO()->id);

        return view('employee.update', ['employee' => $employee, 'positions' => Position::all()]);
    }

    /**
     * Update the specified resource in storage.
     * @throws UnknownProperties
     */
    public function update(PutEmployeeRequest $request)
    {
        $this->service->updateEmployee($request->getDTO());

        return redirect()->route('employee.index');
    }

    /**
     * Remove the specified resource from storage.
     * @throws UnknownProperties
     */
    public function destroy(DeleteEmployeeRequest $request)
    {
        $this->service->deleteEmployee($request->getDTO());

        return redirect()->route('employee.index');
    }


}
