@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/client.css') }}">
<div class="container py-5">
    <h1 class="mb-4 text-center">{{ isset($client) ? 'Edit Client' : 'Create Client' }}</h1>

    <form action="{{ isset($client) ? route('clients.update', $client->id) : route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($client))
            @method('PUT')
        @endif 
        <div class="form-container">
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" id="name" name="name" value="{{ old('name', $client->name ?? '') }}" required>
            </div>
      
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" value="{{ old('email', $client->email ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="phone_number">Phone Number *</label>
                <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $client->phone_number ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="gst_no">GST Number</label>
                <input type="text" id="gst_no" name="gst_no" value="{{ old('gst_no', $client->gst_no ?? '') }}">
            </div>

            <div class="form-group">
                <label for="status">Status *</label>
                <select id="status" name="status" required>
                    <option value="Active" {{ old('status', $client->status ?? '') == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ old('status', $client->status ?? '') == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="no_of_licenses">Number of Licenses *</label>
                <input type="number" id="no_of_licenses" name="no_of_licenses" value="{{ old('no_of_licenses', $client->no_of_licenses ?? '0') }}" required>
            </div>
            <div class="form-group">
                <label for="expertise">Expertise</label>
                <input type="text" id="expertise" name="expertise" value="{{ old('expertise', $client->expertise ?? '') }}">
            </div>

            <div class="form-group">
                <label for="validity">Validity</label>
                <input type="date" id="validity" name="validity" value="{{ old('validity', $client->validity ?? '') }}">
            </div>

            <div class="form-group">
                <label for="payment_mode">Payment Mode</label>
                <select id="payment_mode" name="payment_mode">
                    <option value="Cash" {{ old('payment_mode', $client->payment_mode ?? '') == 'Cash' ? 'selected' : '' }}>Cash</option>
                    <option value="Credit Card" {{ old('payment_mode', $client->payment_mode ?? '') == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                    <option value="Bank Transfer" {{ old('payment_mode', $client->payment_mode ?? '') == 'Bank Transfer' ? 'selected' : '' }}>Bank Transfer</option>
                    <option value="UPI" {{ old('payment_mode', $client->payment_mode ?? '') == 'UPI' ? 'selected' : '' }}>UPI</option>
                </select>
            </div>

            <div class="form-group">
                <label for="payment_details">Payment Details</label>
                <textarea id="payment_details" name="payment_details">{{ old('payment_details', $client->payment_details ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address">{{ old('address', $client->address ?? '') }}</textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-4 w-100">
            {{ isset($client) ? 'Update Client' : 'Create Client' }}
        </button>
    </form>
</div>
@endsection
