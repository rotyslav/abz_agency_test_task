@extends('layouts.app')
@section('content_body')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Manage Employees
                &nbsp;
                <a href="{{ route('employee.create') }}">Add employee</a>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
