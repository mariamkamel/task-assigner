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
        <h2 class="task-list-heading">Task List</h2>
        <table class="table task-list-table">
            <thead>
                <tr>
                    <th class="table-header">Title</th>
                    <th class="table-header">Description</th>
                    <th class="table-header">Assigned To</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                    <tr class="table-row">
                        <td class="table-data">{{ $task->title }}</td>
                        <td class="table-data">{{ $task->description }}</td>
                        <td class="table-data">{{ $task->assignedTo->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-links">{{ $tasks->links() }}</div>
    </div>
    @endsection
    
</html>