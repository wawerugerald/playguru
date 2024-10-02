<?php

namespace App\Http\Controllers;
use App\Models\Industries;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndustriesController extends Controller
{
    //
    public function index(){

        $industries = Industries::orderBy('name', 'asc')->paginate(5);
        return view("industries.index") ->with('industries', $industries);
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Create a new region
        Industries::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Redirect back with a success message
        return redirect()->route('industries')->with('success', 'Industries added successfully.');
    }

}
