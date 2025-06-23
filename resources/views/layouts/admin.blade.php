<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Hotel Reservation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('head')

    <!-- Bootstrap + Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body {
            background: #f7f9fb;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            padding-top: 1rem;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 0.75rem 1rem;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
    </style>
</head>
<body>

<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="{{ route('admin.rooms') }}"><i class="fas fa-bed"></i> Rooms</a>
        <a href="{{ route('admin.bookings') }}"><i class="fas fa-calendar-check"></i> Bookings</a>
        <a href="{{ route('admin.users') }}"><i class="fas fa-users"></i> Users</a>

        <form method="POST" action="{{ route('logout') }}" class="mt-3 px-3">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger w-100"><i class="fas fa-sign-out-alt"></i> Logout</button>
        </form>
    </div>

    <!-- Main Content -->
    <div class="flex-grow-1 p-4">
        @yield('content')
    </div>
</div>

</body>
</html>
