@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
    <div class="header">Welcome to the Dashboard</div>
    <p>Here you can manage clients, handle licenses, view payment info, and perform other administrative tasks.</p>
    <h3>Client Statistics:</h3>
    <ul>
        <li>Total Clients: 2023</li>
        <li>Active Licenses: 15</li>
        <li>Pending Payments: 5</li>
    </ul>
@endsection
