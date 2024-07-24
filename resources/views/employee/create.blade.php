@extends('layouts.app')
@section('content_body')
    <div class="container">
        <div class="row">
            <div class="col"
                 style="width: 600px; background:#a9c1da; padding: 15px;  border: 1px solid black; border-radius: 6px">
                <h1>Add Employee</h1>
                <form action="{{ route('employee.store') }}" method="post">
                    @method("POST")
                    @include('layouts.forms.create-change-employee')
                </form>
            </div>
            <div class="col">
                @include('layouts.errors')
            </div>
        </div>
    </div>
@endsection