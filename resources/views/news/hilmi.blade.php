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
<div class="bg-white">
    <header class="bg-white-500 text-white text-center py-12">
        <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900">About Us</h2>
    </header>

    <section class="text-center py-12 px-4">
        <div class="bg-gray-500">
      <h2 class="text-2xl text-white font-bold">Mission And Values</h2>
      <p class="mt-4 text-white max-w-2xl mx-auto">
        Our mission is to provide exceptional healthcare services with a focus on availability, reliability, and support.
      </p>
      <div class="flex justify-center space-x-8 mt-8 animate-fadeIn">
        <div class="transition transform hover:scale-110">
          <h3 class="text-xl text-white font-bold" >85+</h3>
          <p class="text-white">Specialists</p>
        </div>
        <div class="transition transform hover:scale-110">
          <h3 class="text-xl text-white font-bold" >25+</h3>
          <p class="text-white">Years of Experience</p>
        </div>
      </div></div>
    </section>
@endsection

@section('content')
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        @if(!$news->isEmpty())
            <div class="mx-auto max-w-7xl px-6 lg:px-8 flex flex-col items-center justify-center">
                <div class="mx-auto max-w-2xl text-center lg:mx-0">
                    <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900">Today's News</h2>
                    <p class="mt-4 text-lg sm:text-xl text-gray-600 leading-7">Hot News.</p>
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
@endsection

@section('team')
<div class="bg-white py-12 sm:py-20">

    <div class="mx-auto max-w-7xl px-6 lg:px-8 ">
        <div class="text-center">
            <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900 ">Meet Our Team</h2>
            <p class="mt-4 text-lg sm:text-xl text-gray-600 leading-7 max-w-2xl mx-auto">
                Kenali tim kami yang bekerja keras untuk menyediakan berita terbaik untuk Anda.
            </p>
        </div>
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 flex">
            <!-- Main Content -->
            @foreach ($tim as $t)

            <div class="flex-1 pl-8 pr-8">
                <div class="bg-white p-6 rounded-lg shadow flex items-center">
                    <img src="{{ asset('storage/' . $t->image) }}" class="w-24 h-24 object-cover rounded-full mr-4" alt="Profile Image">
                    <div>
                        <h5 class="text-2xl font-bold mb-2">{{ $t->name }}</h5>
                        <p class="text-sm text-gray-600">{{ $t->position }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
@section('contact')
    <div class="bg-gray-800 text-gray-300 py-8">
        <div class="container mx-auto px-6">
            <div class="lg:flex">
                <div class="w-full lg:w-1/2 mb-4 lg:mb-0">
                    <h2 class="text-lg font-semibold mb-4">Contact Us</h2>
                    <p class="mb-2">Phone: +1234567890</p>
                    <p>Address: 123 Example St, City, Country</p>
                </div>
                <div class="w-full lg:w-1/2">
                    <!-- Replace with your actual map embed code -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15864.562855138936!2d106.9051172!3d-6.2451803!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f359e53a3bfd%3A0x707f8bb6eaa90ad3!2sINDI%20Technology!5e0!3m2!1sid!2sid!4v1720424361363!5m2!1sid!2sid"
                        width="600"
                        height="450"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        class="w-full h-96 rounded-md shadow-md"
                    ></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    <footer class="bg-gray-900 py-12">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center text-gray-300">
            <p>&copy; 2024 Portal Berita. All rights reserved.</p>
            <p class="mt-4">Follow us on:</p>
            <div class="mt-4 flex justify-center space-x-6">
                <a href="#" class="text-gray-300 hover:text-gray-400"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-gray-300 hover:text-gray-400"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-gray-300 hover:text-gray-400"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-gray-300 hover:text-gray-400"><i class="fab fa-linkedin fa-lg"></i></a>
            </div>
        </div>
    </footer>
@endsection
