@extends('layouts.app')
@section('content_body')
    <div class="container"
         style="width: 600px; background:#a9c1da; padding: 15px;  border: 1px solid black; border-radius: 2%">
        <h1>Change Employee</h1>
        @include('layouts.forms.create-change-employee')
    </div>
@endsection