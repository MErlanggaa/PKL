<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;



class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $berita_terbaru = $news->first();
        $tim = Team::all();
    
        if (Auth::check()) {
            $role = Auth::user()->role;
    
            if ($role === 'hilmi') {
                return view('news.hilmi.index', compact('news', 'tim', 'berita_terbaru'));
            } elseif ($role === 'erlangga') {
                return view('news.erlangga', compact('news', 'tim', 'berita_terbaru'));
            }
        }
    
        // Default fallback
        return view('news.index', compact('news', 'tim', 'berita_terbaru'));
    }
    public function dashboardErlangga()
{
    // Logic for Erlangga's dashboard
    return view('news.erlangga');
}

public function dashboardHilmi()
{
    // Logic for Hilmi's dashboard
    return view('news.hilmi');
}

    public function search(Request $request)
    {
        $search = $request->search;
        $data = News::select('id', 'judul', 'isi', 'tanggal')
            ->when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%")
                    ->orWhere('tanggal', 'like', "%{$search}%");
            })
            ->paginate(50);
        return view('news.admin', ['data' => $data]);
    }
    public function srch(Request $request)
    {
        $search = $request->search;
        $news = News::when($search, function ($query, $search) {
                return $query->where('judul', 'like', "%{$search}%")
                             ->orWhere('tanggal', 'like', "%{$search}%");
            })
            ->paginate(10);
    
        $view = 'news.index'; // Default view
    
        if (auth()->check()) {
            $userRole = auth()->user()->role;
            if ($userRole === 'hilmi') {
                $view = 'news.hilmi';
            } elseif ($userRole === 'erlangga') {
                $view = 'news.erlangga';
            }
        }
    
        return view($view, compact('news'));
    }
    
    public function create()
    {
        return view('news.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg|',
            'isi' => 'required'
        ]);

        $filename = '';

        if ($request->has('cropped_image')) {
            $data = $request->cropped_image;

            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $imageData = base64_decode($data);
            $image_name = "/storage/" . time() . '_' . Str::random(10) . '.png';
            $path = public_path() . $image_name;

            if (!File::isDirectory(public_path('storage'))) {
                File::makeDirectory(public_path('storage'), 0777, true, true);
            }

            file_put_contents($path, $imageData);

            $filename = $image_name;
        } else {
            $ext = $request->foto->getClientOriginalExtension();
            $filename = rand(9, 999) . '_' . time() . '.' . $ext;
            $request->foto->move(public_path('storage'), $filename);
            $filename = 'storage' . $filename;
        }

        $description = $request->isi;

        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {
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

        News::create([
            'judul' => $request->judul,
            'tanggal' => $request->tanggal,
            'foto' => $filename, 
            'isi' => $description 
        ]);

        // Tampilkan pesan sukses menggunakan SweetAlert
        Alert::success('Berhasil', 'Berita berhasil ditambahkan!');

        // Redirect ke halaman index berita dengan pesan status
        return redirect()->route('news.index')->with('status', 'store');
    }

    public function show($id)
{
    // Ambil berita berdasarkan ID yang dipilih
    $news = News::findOrFail($id);
    $latestNews = News::orderBy('tanggal', 'desc')->take(3)->get();
    

    // $latestNews = News::orderBy('tanggal', 'desc') // Urutkan berdasarkan tanggal secara menurun
    // ->where('tanggal', '<=', now()) // Ambil hanya berita dengan tanggal kurang dari atau sama dengan hari ini
    // ->take(5) // Ambil 5 berita terbaru
    // ->get();

return view('news.show', compact('news', 'latestNews'));

}

    


    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.edit', compact('news'));
    }
    
   
    public function update(Request $request, $id)
{
    $news = News::findOrFail($id);

    $request->validate([
        'judul' => 'required|min:3',
        'tanggal' => 'required',
        'foto' => 'nullable|image|mimes:png,jpg,jpeg|between:50,1000',
        'isi' => 'required|min:10'
    ]);

    // Handle file upload if there's a new file
    if ($request->hasFile('foto')) {
        // Delete old file if exists
        if ($news->foto && file_exists(public_path('storage/' . $news->foto))) {
            unlink(public_path('storage/' . $news->foto));
        }

        $ext = $request->foto->getClientOriginalExtension();
        $filename = rand(9, 999) . '_' . time() . '.' . $ext;
        $request->foto->move('storage', $filename);

        $news->foto = $filename;
    }

    // Handle cropped image if present
    if ($request->has('cropped_image')) {
        $croppedData = $request->cropped_image;

        // Decode and save cropped image
        list($type, $croppedData) = explode(';', $croppedData);
        list(, $croppedData) = explode(',', $croppedData);
        $croppedImageData = base64_decode($croppedData);

        $croppedImageName = "/storage/" . time() . '_' . Str::random(10) . '.png';
        $croppedImagePath = public_path() . $croppedImageName;

        // Ensure upload directory exists
        if (!File::isDirectory(public_path('storage'))) {
            File::makeDirectory(public_path('storage'), 0777, true, true);
        }

        // Save cropped image
        file_put_contents($croppedImagePath, $croppedImageData);

        // Update filename to cropped image path
        $news->foto = $croppedImageName;
    }

    // Update news data
    $news->judul = $request->judul;
    $news->tanggal = $request->tanggal;

    // Process and update article content
    $description = $request->isi;

    // Handling Summernote content
    $dom = new \DomDocument();
    libxml_use_internal_errors(true); // Ignore HTML5 parsing errors
    $dom->loadHtml(mb_convert_encoding($description, 'HTML-ENTITIES', 'UTF-8'), LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

    $images = $dom->getElementsByTagName('img');

    foreach ($images as $k => $img) {
        $data = $img->getAttribute('src');

        if (strpos($data, 'data:image') === 0) {
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);

            $imageData = base64_decode($data);
            $image_name = "/upload/" . time() . $k . '.png';
            $path = public_path() . $image_name;

            // Check and create directory if not exists
            if (!File::isDirectory(public_path('upload'))) {
                File::makeDirectory(public_path('upload'), 0777, true, true);
            }

            file_put_contents($path, $imageData);

            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }
    }

    $description = $dom->saveHTML();

    // Update news content with processed HTML
    $news->isi = $description;

    $news->save();

    // Redirect back to news index with success message
    return redirect()->route('news.index')->with('status', 'update');
}

    
    public function destroy($id)
{
    $news = News::findOrFail($id);

    if ($news->foto && file_exists(storage_path('app/public/' . $news->foto))) {
        unlink(storage_path('app/public/' . $news->foto));
    }

    $news->delete();

    return redirect()->route('news.search')->with('status', 'Data berhasil dihapus');
}
}