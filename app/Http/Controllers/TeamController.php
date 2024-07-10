<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class TeamController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;
    
            // Fetch teams based on the user's role
            $team = Team::where('role', $userRole)->get();
            
            return view('team.index', compact('team'));
        } else {
            // Redirect guests to the login page
            return redirect()->route('login'); // Or handle guests in another way if needed
        }
    }
    




    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
{
    // Validate data
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for the image
    ]);

    // Check if validation fails
    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    try {
        // Save the image to storage
        $imagePath = $request->file('image')->store('team_images', 'public');

        // Save the team data to the database
        Team::create([
            'name' => $request->name,
            'position' => $request->position,
            'image' => $imagePath,
            'role' => Auth::user()->role, // Set the role of the creator
        ]);

        // Redirect or go back to the previous page with a success message
        return redirect('/team')->with('success', 'Team added successfully!');
    } catch (\Exception $e) {
        // Handle if there is an error while saving the image or team data
        return redirect()->back()->with('error', 'Failed to add team: ' . $e->getMessage());
    }
}


    public function edit ($id)
    {
        $team = Team::find($id);
        return view('team.edit', compact('team'));
        
    }

    public function update(Request $request, $id)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar (opsional)
    ]);

 
    $team = Team::find($id);
    if (!$team) {
        return redirect('/team')->with('error', 'Team not found!');
    }


    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('team_images', 'public');
        $team->image = $imagePath;
    }

    
    $team->name = $request->name;
    $team->position = $request->position;
    $team->save();

    
    return redirect('/team')->with('success', 'Team updated successfully!');
}


public function destroy ($id){
    $t = Team::find($id);
    $t->delete();
    return redirect('/team')->with('success', 'Team delete successfully!');
}

// public function show (){
//     $show = Team::all();
//     return view('team.show', compact('show'));

// }
}

