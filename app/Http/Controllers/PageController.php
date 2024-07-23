<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Page; // Perbarui namespace di sini
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;



class PageController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userRole = Auth::user()->role;
    
            // Fetch teams based on the user's role
            $page = Page::where('role', $userRole)->get();
            
            return view('page.index', compact('page'));
        } else {
            // Redirect guests to the login page
            return redirect()->route('login'); // Or handle guests in another way if needed
        }
    }

    public function create()
    {
        return view('page.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:9',
            'subjudul' => 'required|string|max:12',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for the image
        ]);
    
        // Handle the cropped image
        $filename = '';
        if ($request->has('foto')) {
            $croppedImage = $request->input('foto');
            $croppedImage = str_replace('data:image/png;base64,', '', $croppedImage);
            $croppedImage = str_replace(' ', '+', $croppedImage);
            $imageData = base64_decode($croppedImage);
            
            $directory = 'storage/page';
            if (!file_exists(public_path($directory))) {
                mkdir(public_path($directory), 0777, true); // Create the directory if it doesn't exist
            }
    
            $filename = 'page/' . time() . '_' . Str::random(10) . '.png'; // Store path relative to storage/app/public
            file_put_contents(public_path('storage/' . $filename), $imageData);
        }
    
    
        // Save the post to the database
        Page::create([
            'judul' => $request->judul,
            'subjudul' => $request->subjudul,
            'foto' => $filename,
            'role' => auth()->user()->role,
        ]);
    
        // Show success message using SweetAlert
        Alert::success('Berhasil', 'Berita berhasil ditambahkan!');
    
        // Redirect back to the post index page
        return redirect()->route('post.index')->with('status', 'store');
    }
    
    
   
    public function edit ($id)
    {
        $page = Page::find($id);
        return view('page.edit', compact('page'));
        
    }
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
    
        $request->validate([
            'judul' => 'required|string|max:9',
            'subjudul' => 'required|string|max:12',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for the image
        ]);
    
        // Handle the cropped image
        if ($request->has('foto')) {
            // Delete the old image if exists
            if ($page->foto && file_exists(public_path('storage/' . $page->foto))) {
                unlink(public_path('storage/' . $page->foto));
            }
    
            $croppedImage = $request->input('foto');
            $croppedImage = str_replace('data:image/png;base64,', '', $croppedImage);
            $croppedImage = str_replace(' ', '+', $croppedImage);
            $imageData = base64_decode($croppedImage);
    
            $directory = 'storage/page';
            if (!file_exists(public_path($directory))) {
                mkdir(public_path($directory), 0777, true); // Create the directory if it doesn't exist
            }
    
            $filename = 'page/' . time() . '_' . Str::random(10) . '.png'; // Store path relative to storage/app/public
            file_put_contents(public_path('storage/' . $filename), $imageData);
    
            // Update the image path in the database
            $page->foto = $filename;
        }
    
        // Update the page data
        $page->judul = $request->judul;
        $page->subjudul = $request->subjudul;
        $page->role = auth()->user()->role;
        $page->save();
    
        // Show success message using SweetAlert
        Alert::success('Berhasil', 'Berita berhasil diupdate!');
    
        // Redirect back to the news index page
        return redirect()->route('post.index')->with('status', 'update');
    }
    
public function destroy($id)
{
    $page = Page::findOrFail($id);

    if ($page->foto && file_exists(public_path('storage/page/' . $page->foto))) {
        unlink(public_path('storage/page/' . $page->foto));
    }

    $page->delete();

    return redirect()->route('news.index')->with('status', 'delete');
}

}