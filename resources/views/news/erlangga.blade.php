@extends('layouts.app')

@section('hero')
@if (isset($berita_terbaru))
<div class="relative bg-white py-12 sm:py-20">
    <div class="absolute inset-0">
        <img class="w-full h-full object-cover" src="{{ asset($berita_terbaru->foto) }}" alt="{{ $berita_terbaru->judul }}">
        <div class="absolute inset-0 bg-gray-900 opacity-50"></div>
    </div>
    <div class="relative mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center justify-center text-center">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold text-white">Selamat Datang di Portal Berita</h1>
        <p class="mt-4 text-lg sm:text-xl text-white">Temukan berita terkini dan terpercaya di sini.</p>
    </div>
</div>
@endif
@endsection
@section('about')
<div class="bg-white py-12 sm:py-20">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900">Tentang Kami</h2>
            <p class="mt-4 text-lg sm:text-xl text-gray-600 leading-7 max-w-2xl mx-auto">
                Kami adalah portal berita yang berdedikasi untuk memberikan berita terkini dan terpercaya. Misi kami adalah
                menyediakan informasi yang akurat dan relevan kepada masyarakat.
            </p>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="bg-white py-12 sm:py-20 shadow-2xl">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        @if(!$news->isEmpty())
        <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center justify-center">
            <div class="mx-auto max-w-2xl text-center lg:mx-0">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900">Berita Hari ini</h2>
                <p class="mt-4 text-lg sm:text-xl text-gray-600 leading-7">List Berita Terbaru.</p>
            </div>
        </div>
        @endif

        @if($news->isEmpty())
            <div class="mx-auto max-w-7xl text-center lg:mx-0 mt-8">
                <p class="text-lg text-gray-600">Berita tidak ditemukan.</p>
            </div>
        @else
            <div class="mx-auto mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($news as $item)
                <!-- Artikel -->
                <article class="flex flex-col overflow-hidden rounded-lg shadow-lg transition-colors duration-300 ease-in-out hover:bg-blue-100">
                    <a href="{{ route('news.show', $item->id) }}">
                        <img id="croppedImage" src="{{ asset($item->foto) }}" class="h-64 w-full object-cover" alt="{{ $item->judul }}" />
                        <div class="px-6 py-4">
                            <h3 class="mt-2 text-xl font-semibold leading-tight text-gray-900">{{ $item->judul }}</h3>
                            <div class="text-xs text-gray-500 mt-2">{{ $item->tanggal }}, {{ optional($item->created_at)->format('M d, Y') }}</div>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
@section('team')
<div class="bg-white py-12 sm:py-20 lg">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900">Meet Our Team</h2>
            <p class="mt-4 text-lg sm:text-xl text-gray-600 leading-7 max-w-2xl mx-auto">
                Kenali tim kami yang bekerja keras untuk menyediakan berita terbaik untuk Anda.
            </p>
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            @foreach ($tim as $t)
            <div class="bg-white p-6 rounded-lg shadow flex items-center">
                <img src="{{ asset('storage/' . $t->image) }}" class="w-24 h-24 object-cover rounded-full mr-4" alt="Profile Image">
                <div>
                    <h5 class="text-2xl font-bold mb-2 break-words">{{ $t->name }}</h5>
                    <p class="text-sm text-gray-600">{{ $t->position }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('contact')
<!-- Contact Us Section -->
<div class="bg-gray-800 text-gray-300 py-4">
    <div class="container mx-auto px-6">
        <div class="lg:flex">
            <div class="w-full lg:w-1/2 mb-5 mt-15 lg:mb-0">
                <h2 class="text-xl font-semibold mb-2 text-blue-200">Kontak Kami</h2>
                <p class="mb-2">No Telp : +62851552277080</p>
                <p>Jalan Jalanan</p>
            </div>
            <div class="w-full lg:w-1/2">
                <h2 class="text-center font-semibold text-blue-200"> Lokasi Kami Berada </h2>
                <!-- Replace with your actual map embed code -->
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.562855138936!2d106.9051172!3d-6.2451803!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f359e53a3bfd%3A0x707f8bb6eaa90ad3!2sINDI%20Technology!5e0!3m2!1sid!2sid!4v1720424361363!5m2!1sid!2sid" width="100%" height="200" style="border:10;" allowfullscreen="" loading="lazy"   class="w-full  rounded-md shadow-md"
                ></iframe>
            </div>
        </div>
    </div>
</div>


@endsection
