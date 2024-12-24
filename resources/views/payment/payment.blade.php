@extends('layouts.app')

@section('title', 'Payment Info')
<link rel="stylesheet" href="{{ asset('css/paymentscreen.css') }}">
@section('content')

<div class="center-container">
    <form class="payment-form" action="{{ route('payments.process') }}" method="POST">
        <h2 style="text-align: center; margin-bottom: 20px;">Make a Payment</h2>
        @csrf

        @if ($errors->any())
            <div class="error-message">{{ $errors->first() }}</div>
        @endif

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Your Name" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Your Email" required>

        <label for="amount">Amount (INR):</label>
        <input type="number" name="amount" id="amount" placeholder="Enter amount" required>

        <button type="submit">Proceed to Pay</button>
    </form>
</div>
@endsection
