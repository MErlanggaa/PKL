<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth; // Add this line

use DomDocument;

class NewssController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = News::orderBy('judul','asc')->get();
        return response ()->json([
            'status'=>true,
            'message'=> 'Data Ditemukan',
            'data' =>$data
        ], 202);
    }

    /**
     * Store a newly created resource in storage.
     */
  
     public function store(Request $request)
     {
         try {
             Log::info('Store method called');
 
             $request->validate([
                 'judul' => 'required|string|max:255',
                 'tanggal' => 'required|date',
                 'foto' => 'required|image|mimes:png,jpg,jpeg',
                 'isi' => 'required|string',
             ]);
 
             Log::info('Validation passed');
 
             // Simpanan gambar
             $filename = '';
             if ($request->has('foto')) {
                 $foto = $request->file('foto');
                 $filename = 'storage/' . time() . '_' . Str::random(10) . '.' . $foto->getClientOriginalExtension();
                 $foto->move(public_path('storage'), $filename);
             }
 
             Log::info('Image processed: ' . $filename);
 
             // Manipulasi isi berita
             $description = $request->isi;
             $dom = new \DomDocument();
             $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
 
             // Manipulasi gambar dalam isi berita
             $images = $dom->getElementsByTagName('img');
             foreach ($images as $img) {
                 $data = $img->getAttribute('src');
                 if (strpos($data, 'data:image') === 0) {
                     list($type, $data) = explode(';', $data);
                     list(, $data) = explode(',', $data);
                     $imageData = base64_decode($data);
                     $image_name = "/upload/" . time() . '_' . Str::random(10) . '.png';
                     $path = public_path() . $image_name;
 
                     if (!File::isDirectory(public_path('upload'))) {
                         File::makeDirectory(public_path('upload'), 0777, true, true);
                     }
 
                     file_put_contents($path, $imageData);
 
                     $img->removeAttribute('src');
                     $img->setAttribute('src', $image_name);
                 }
             }
 
             $description = $dom->saveHTML();
 
             Log::info('Content processed');
 
             // Simpan berita ke dalam database
             $news = News::create([
                 'judul' => $request->judul,
                 'tanggal' => $request->tanggal,
                 'foto' => $filename,
                 'isi' => $description,
                 'role' => $request->user()->role, // Mengambil role dari pengguna yang sedang login
             ]);
 
             Log::info('News created: ' . $news->id);
 
             // Return success response
             return response()->json(['message' => 'Berita berhasil ditambahkan!', 'news' => $news], 201);
         } catch (\Exception $e) {
             Log::error('Error in store method: ' . $e->getMessage());
             return response()->json(['error' => 'Internal Server Error', 'message' => $e->getMessage()], 500);
         }
     }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = News::find($id);
        if($data){
            return response()->json([
                'status'=>true,
                'message'=>'data ditemukkan',
                'data' =>$data
            ], 200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'data tidak ditemukkan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $request->validate([
            'judul' => 'required|min:3',
            'tanggal' => 'required',
            'foto' => 'nullable|image|mimes:png,jpg,jpeg|between:50,1000',
            'isi' => 'required|min:10'
        ]);

        // Update news data
        $news->judul = $request->judul;
        $news->tanggal = $request->tanggal;

        // Process and update article content
        $description = $request->isi;

        // Handling Summernote content
       


        // Update news content with processed HTML
        $news->isi = $description;

        $news->save();

        return response()->json(['message' => 'News updated successfully', 'news' => $news], 200);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $user = Auth::user();

        if ($news->role !== $user->role) {
            return response()->json([
                'status' => false,
                'message' => 'Role anda tidak bisa'
            ], 403);
        }

        if ($news->foto && file_exists(storage_path('app/public/' . $news->foto))) {
            unlink(storage_path('app/public/' . $news->foto));
        }

        $news->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan delete data'
        ]);
    }
            
}
