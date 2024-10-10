<?php

namespace App\Http\Controllers;

use App\Models\Phase; // Make sure to import the Phase model
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch phases with user count
        $phases = Phase::withCount('users')->get();

        // Pass phases to the view
        return view('admin.dashboard', compact('phases'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other fields you want to validate
        ]);

        // Create a new phase
        Phase::create($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Phase created successfully.');
    }
}
