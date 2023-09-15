<!-- resources/views/tasks/create.blade.php -->
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
    <div class="container form-container">
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
    
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
    
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
    
            <div class="form-group">
                <label for="assigned_by_id">Assigned By:</label>
                <select name="assigned_by_id" id="assigned_by_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach($assignedByUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group">
                <label for="assigned_to_id">Assigned To:</label>
                <select name="assigned_to_id" id="assigned_to_id" class="form-control" required>
                    <option value="">Select User</option>
                    @foreach($assignedToUsers as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
    @endsection
    
</html>