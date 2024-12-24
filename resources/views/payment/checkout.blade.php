@extends('layouts.app')

@section('title', 'Complete Payment')

@section('content')
    <h2>Complete Your Payment</h2>
    <form id="payment-form" action="#" method="POST">
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ config('services.razorpay.key') }}"
            data-amount="{{ $order->amount }}"
            data-currency="INR"
            data-order_id="{{ $order->id }}"
            data-name="Razorpay Payment"
            data-description="Order #{{ $order->id }}"
            data-prefill.name="{{ $name }}"
            data-prefill.email="{{ $email }}"
            data-theme.color="#007bff"
        ></script>
    </form>
@endsection
