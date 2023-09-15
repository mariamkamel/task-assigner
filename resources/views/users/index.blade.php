@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>User List</h1>
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </div>
@endsection
