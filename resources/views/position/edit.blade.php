@extends('layouts.app' )
@section('content_body')
    <div class="container"
         style="width: 600px; background:#a9c1da; padding: 15px;  border: 1px solid black; border-radius: 6px">
        <form action="{{ route('position.store') }}">
            <label for="exampleFormControlInput1" class="form-label">Position</label>
            <input type="text" class="form-control" value="{{ $position->position }}">
            <br>
            <input type="submit" value="Submit" class="btn btn-primary">
        </form>
    </div>
@endsection