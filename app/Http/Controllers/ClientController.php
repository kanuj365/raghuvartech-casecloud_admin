<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('client_list', compact('clients'));
    }

    public function create()
    {
        return view('client');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients',
            'phone_number' => 'required|string|max:15',
            'gst_no' => 'nullable|string|max:20',
            'status' => 'required|in:Active,Inactive',
            'no_of_licenses' => 'required|integer|min:0',
            'expertise' => 'nullable|string|max:255',
            'validity' => 'nullable|date',
            'payment_mode' => 'nullable|in:Cash,Credit Card,Bank Transfer,UPI',
            'payment_details' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:500',
        ]);
    
        try {
            Client::create($validated);
    
            return redirect()->route('clients')->with('success', 'Client added successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }
    
    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'phone_number' => 'required|string|max:15',
            'gst_no' => 'nullable|string|max:20',
            'status' => 'required|in:Active,Inactive',
            'no_of_licenses' => 'required|integer|min:0',
            'expertise' => 'nullable|string|max:255',
            'validity' => 'nullable|date',
            'payment_mode' => 'nullable|in:Cash,Credit Card,Bank Transfer,UPI',
            'payment_details' => 'nullable|string|max:500',
            'address' => 'nullable|string|max:500',
        ]);
    
        try {
            $client->update($validated);
            return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Failed to update client: ' . $e->getMessage()]);
        }
    }
    
    
    protected function migrateClientDatabase($databaseName)
    {
        config(['database.connections.temporary' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST'),
            'port' => env('DB_PORT'),
            'database' => $databaseName,
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
        ]]);
    
        \Artisan::call('migrate', [
            '--database' => 'temporary',
            '--path' => 'database/migrations/client',
            '--force' => true,
        ]);
    }    

    public function show(Client $client)
    {
        return response()->json($client);
    }

    public function edit(Client $client)
    {
        return view('client', compact('client'));
    }


    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to delete client: ' . $e->getMessage()]);
        }
    }
}



