<?php

// app/Http/Controllers/PhaseController.php

// app/Http/Controllers/PhaseController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Ensure to import the User model
use App\Models\Phase; // Import the Phase model

class PhaseController extends Controller
{
    // Display all phases with user counts
    public function index()
    {
        // Fetch phase counts
        $phases = Phase::leftJoin('users as u', 'u.phase_id', '=', 'phases.id') // Join phases and users
                    ->select('phases.id as phase_id', 'phases.name as phase_name', \DB::raw('COUNT(u.id) as user_count'))
                    ->groupBy('phases.id', 'phases.name') // Grouping by phase fields
                    ->get();

        return view('admin.phase_users', compact('phases'));
    }

    // Display users in a specific phase
    public function show($phase_id)
    {
        // Fetch the selected phase
        $phase = Phase::findOrFail($phase_id); // Fetch the phase to get its name

        // Fetch users in the selected phase
        $users = User::where('phase_id', $phase_id)->get();

        return view('admin.phase_users_detail', compact('users', 'phase'));
    }
}
