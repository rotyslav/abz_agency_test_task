@extends('layouts.app' )
@section('content_body')
    <div class="container"
         style="width: 600px; background:#a9c1da; padding: 15px;  border: 1px solid black; border-radius: 6px">
        <a href="{{ route('position.create') }}">Add Position</a>
        <table class="table">
            <thead>
            <tr>
                <th>№</th>
                <th>Position</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($positions as $position)
                <tr>
                    <th>{{ $position->id }}</th>
                    <th>{{ $position->position }}</th>
                    <th><a href="{{ route('position.edit', ['id' => $position->id]) }}">Update</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection