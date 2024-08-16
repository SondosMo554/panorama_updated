<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all(); 
        return view('clients', ['clients' => $clients]); 
    }

    public function create()
    {
        return view('create_clients'); 
    }

    public function manage()
    {
        $clients = Client::all(); 
        return view('manage_clients', ['clients' => $clients]); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'description' => 'required|string',
        ]);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null; 
        }
    
        Client::create([
            'title' => $request->title,
            'image' => $imageName, 
            'description' => $request->description,
        ]);
    
        return redirect()->route('clients.manage')->with('success', 'Client created successfully.');
    }

    
    

    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('edit_clients', compact('client'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'description' => 'required|string',
        ]);

        $client = Client::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            if ($client->image && file_exists(public_path('images/' . $client->image))) {
                unlink(public_path('images/' . $client->image));
            }

            $client->image = $imageName;
        }

        $client->title = $request->input('title');
        $client->description = $request->input('description');
        $client->save();

        return redirect()->route('clients.manage')->with('success', 'Client updated successfully.'); 
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        if ($client->image && file_exists(public_path('images/' . $client->image))) {
            unlink(public_path('images/' . $client->image));
        }
        $client->delete();
    
        return redirect()->route('clients.manage')->with('success', 'Client deleted successfully.'); 
    }
    
}
