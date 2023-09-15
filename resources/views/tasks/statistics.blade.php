<!-- resources/views/tasks/statistics.blade.php -->

@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
@section('content')
    <div class="container">
        <h1 class="task-list-heading">Task Statistics</h1>
        <table  class="table task-list-table">
            <thead>
                <tr>
                    <th class="table-header">User</th>
                    <th class="table-header">Task Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topUsers as $user)
                <tr class="table-row">
                    <td class="table-data">{{ $user->name }}</td>
                    <td class="table-data">{{ $user->tasks_assigned_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
</html>