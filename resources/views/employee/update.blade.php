@extends('layouts.app')
@section('content_body')
    <div class="container">
        <div class="row">
            <div class="col"
                 style="width: 600px; background:#a9c1da; padding: 15px;  border: 1px solid black; border-radius: 6px">
                <h1>Change Employee</h1>
                <form action="{{ route('employee.update') }}" method="post">
                    @method('PUT')
                    @include('layouts.forms.create-change-employee')
                    <input type="hidden" name="id" value="{{ $employee->id }}">
                </form>
                <form action="{{ route('employee.destroy') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Delete" class="btn btn-danger">
                    <input type="hidden" name="id" value="{{ $employee->id }}">
                </form>
            </div>
            <div class="col">
                @include('layouts.errors')
            </div>
        </div>
    </div>
@endsection