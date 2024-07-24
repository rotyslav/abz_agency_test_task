<?php

namespace App\DataTables;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class EmployeesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param  QueryBuilder  $query  Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->addColumn('headmen', function (Employee $employee) {
                return !is_null($employee->headmen) ? $employee->headmen->name : null;
            })->addColumn('position', function (Employee $employee) {
                return $employee->position->position;
            })->addColumn('action', function (Employee $employee) {
                return '<a href='.route('employee.edit', ['id' => $employee->id]).'>Update</a>';
            })
            ->rawColumns(['headmen', 'position', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Employee $model): QueryBuilder
    {
        return $model->newQuery()->with(['position', 'headmen']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('employees-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [

            'id',
            'name',
            'email',
            'phone',
            'position' => ['title' => 'Position'],
            'salary',
            'headmen'  => ['title' => 'Headmen'],
            'date_of_employment',
            'action'   => ['title' => 'Actions', 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Employees_'.date('YmdHis');
    }
}
