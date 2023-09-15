<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags, title, and stylesheets should go here -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Task Assigner</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body style="background-color: antiquewhite ">
    <!-- Navigation bar or header section -->
    <header>
        <h1>Admin Task Assigner</h1>
        <nav>
            <a class="nav-link" href="{{ route('tasks.create') }}">Create</a>

            <a class="nav-link" href="{{ route('tasks.index') }}">Tasks</a>

            <a class="nav-link" href="{{ route('statistics.topUsers') }}">Statistics</a>
        </nav>
    </header>
 

    <!-- Main content section -->
    <main class="space-between-header">
        <div class="container" style="display: flex; justify-content: center;">
            @yield('content')
        </div>
    </main>

    <!-- Add your JavaScript scripts here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
