<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <!-- <li><a href="#">Registration</a></li> -->
            <!-- <li><a href="#">Login</a></li> -->
            <li><a href="{{ route('clients') }}">Manage Clients</a></li>
            <li><a href="#">Licence Management</a></li>
            <li><a href="{{ route('payment.index') }}">Payment Info</a></li>
            <li><a href="#">Subscription Details</a></li>
            <li><a href="#">User Management</a></li>
            <li><a href="#">Reminders</a></li>
            <li><a href="#">Mailing</a></li>
        </ul>
    </div>
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
