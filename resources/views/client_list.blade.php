@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/clientlist.css') }}">
<div class="container-fluid px-5 position-relative">
    <h2 class="fw-bold mb-4">Client List</h2>

    <!-- Add Client Button -->
    <a href="{{ route('clients.create') }}" class="add-client-btn top-right">Add Client</a>

    @if($clients->isEmpty())
        <div class="alert alert-info text-center">No clients found.</div>
    @else
    <div class="table-responsive">
        <table class="table align-middle bg-white">
            <thead>
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 20%;">Name</th>
                    <th style="width: 25%;">Email</th>
                    <th style="width: 15%;">Phone</th>
                    <th style="width: 10%;">Status</th>
                    <th style="width: 25%;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>
                        @if($client->status === 'active')
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
@endsection
