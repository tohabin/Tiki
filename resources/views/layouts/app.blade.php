<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Ticketing System</title>
    <!-- Add your CSS and JS CDN links here -->
    <!-- Example Bootstrap CSS and JS CDN links -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Ticketing System</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->routeIs('dashboard*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item {{ request()->routeIs('users*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('users.index') }}">Users</a>
            </li>
            <li class="nav-item {{ request()->routeIs('locations*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('locations.index') }}">Locations</a>
            </li>
            <li class="nav-item {{ request()->routeIs('trips*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('trips.index') }}">Trips</a>
            </li>
            <li class="nav-item {{ request()->routeIs('seat_allocations*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('seat_allocations.index') }}">Seat Allocations</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
