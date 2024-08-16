<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all(); 
        return view('services', ['services' => $services]); 
    }

    public function manage()
    {
        $services = Service::all(); 
        return view('manage_services', ['services' => $services]); 
    }

    public function create()
    {
        return view('create_services'); 
    }
    
    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('edit_services', compact('service'));
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

        Service::create([
            'title' => $request->title,
            'image' => $imageName, 
            'description' => $request->description,
        ]);

        return redirect()->route('manage.services')->with('success', 'Service created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|string',
        ]);
        
        $service = Service::findOrFail($id);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            
            if ($service->image && file_exists(public_path('images/' . $service->image))) {
                unlink(public_path('images/' . $service->image));
            }
            
            $service->image = $imageName;
        }
        
        $service->title = $request->input('title');
        $service->description = $request->input('description');
        $service->save();
        
        return redirect()->route('manage.services')->with('success', 'Service updated successfully.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        
        // Delete the image if it exists
        if ($service->image && file_exists(public_path('images/' . $service->image))) {
            unlink(public_path('images/' . $service->image));
        }

        $service->delete();

        return redirect()->route('manage.services')->with('success', 'Service deleted successfully.');
    }
}
