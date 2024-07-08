<?php

namespace App\Http\Controllers;

use App\Models\Backend\Service;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('backend.pages.services.index', compact('services'));
    }




    /**
     * Show the form for creating a new service.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.services.create_service');
    }

    /**
     * Store a newly created service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required',
        ]);

        $imagePath = $request->file('image')->store('service', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"));
        $image->fit(300, 300);
        $image->save(public_path("storage/{$imagePath}"));
        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
        ]);


       // Service::create($request->all());

        return redirect()->back()->with('success', 'Service created successfully.');

    }

    /**
     * Display the specified service.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified service.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('backend.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified service in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Add validation for image
        ]);

        $service = Service::findOrFail($id);

        if ($request->hasFile('image')) {
            // Delete previous image if exists
            if ($service->image && file_exists(public_path("storage/{$service->image}"))) {
                unlink(public_path("storage/{$service->image}"));
            }

            $imagePath = $request->file('image')->store('blog', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"));
            $image->resize(200, 200)->save();
            $service->image = $imagePath;
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('service.index')
            ->with('success', 'Service updated successfully.');
    }


    /**
     * Remove the specified service from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'Service deleted successfully.');
    }


    //api functions

    public function apiindex()
    {
        $services = Service::all();
//        return response()->json($services);
        $services->transform(function ($service) {
            $service->image = asset('storage/' . $service->image);
            return $service;
        });
        return response()->json($services);
    }
}
