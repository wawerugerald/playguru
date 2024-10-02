<?php

namespace App\Http\Controllers;

use App\Models\Regions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegionsController extends Controller
{
    public function index()
    {
        // Get all regions
        $regions = Regions::orderBy('region_name', 'asc')->paginate(10);

        // Pass the regions to the view
        return view("regions.index")->with('regions', $regions);
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'region_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new region
        Regions::create([
            'region_name' => $request->region_name,
        ]);

        // Redirect back with a success message
        return redirect()->route('regions')->with('success', 'Region added successfully.');
    }

    public function edit($id)
    {
        // Find the region by ID
        $region = Regions::findOrFail($id);

        // Return the region data (you can modify this if you need to return a view)
        return response()->json($region);
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'region_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Find the region and update it
        $region = Regions::findOrFail($id);
        $region->update([
            'region_name' => $request->region_name,
        ]);

        // Redirect back with a success message
        return redirect()->route('regions')->with('success', 'Region updated successfully.');
    }
}
