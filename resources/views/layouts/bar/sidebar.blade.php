@vite('resources/css/app.css')

<div class="md:col-span-1">
    <div class="bg-white p-4 rounded-lg shadow">
        <h2 class="text-xl font-semibold mb-4 text-center">Berita Terbaru</h2>
        <ul>
            @foreach($latestNews as $news)
            <li class="mb-4">
                <img id="croppedImage" src="{{ asset($news->foto) }}" class=" h-32 w-full object-cover rounded-lg mb-2" alt="{{ $news->judul }}">
                <a href="{{ route('news.show', $news->id) }}" class="text-black hover:text-blue-700 block font-semibold">{{ $news->judul }}</a>
                <p class="text-sm text-gray-600">{{ $news->tanggal }}</p>
            </li>
            @endforeach
        </ul>
    </div>
</div>
