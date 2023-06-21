<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();

        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'phone' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'hours' => 'required|string|max:255',
            'status' => 'required|boolean',
        ];

        $messages = [
            'name.required' => 'Name is required.',
            'address.required' => 'Address is required.',
            'latitude.required' => 'Latitude is required.',
            'longitude.required' => 'Longitude is required.',
            'phone.required' => 'Phone is required.',
            'website.required' => 'Website is required.',
            'description.required' => 'Description is required.',
            'hours.required' => 'Hours is required.',
            'status.required' => 'Status is required.',
        ];

        $valid = $request->validate($rules, $messages);
        dd($valid);

    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        //
    }
}
