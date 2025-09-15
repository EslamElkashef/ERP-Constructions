<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Requests\ClientRequest;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        try {
            Client::create($request->validated());
            return redirect()->route('clients.index')->with('success', 'Successfully Created');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        try {
            $client->update($request->validated());
            return redirect()->route('clients.show', $client->id)->with('success', 'Successfully Updated Client');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    public function destroy(Client $client)
    {
        try {
            $client->delete();
            return redirect()->route('clients.index')->with('success', 'Successfully Deleted Client');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
