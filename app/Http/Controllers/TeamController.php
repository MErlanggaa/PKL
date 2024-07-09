<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TeamController extends Controller
{
    public function index()
    {
        $team = Team::all();
        return view('team.index', compact('team'));
        
    }


    public function create()
    {
        return view('team.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk gambar
        ]);
    
        // Cek apakah validasi berhasil
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        try {
            // Simpan gambar ke penyimpanan
            $imagePath = $request->file('image')->store('team_images', 'public');
    
            // Simpan data tim ke database
            Team::create([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $imagePath,
            ]);
    
            // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
            return redirect('/team')->with('success', 'Team added successfully!');
        } catch (\Exception $e) {
            // Tangani jika terjadi kesalahan saat menyimpan gambar atau data tim
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

public function show (){
    $show = Team::all();
    return view('team.show', compact('show'));

}
}

