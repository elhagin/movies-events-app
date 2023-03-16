@extends('layouts.app')

@section('content')
    <div>
        <h1>Create Movie</h1>
        <form method="post" action="{{ route('movies.store') }}">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name">
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection
