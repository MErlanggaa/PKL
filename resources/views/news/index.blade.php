@extends('layouts.app')



@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-4xl font-semibold mb-6 text-center">Ini adalah halaman admin utama</h2>

    <!-- Tambahkan konten atau komponen lain yang diperlukan di sini -->
</div>
@endsection


    {{-- <div class="bg-white py-12 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 ">
            <div class="text-center">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900 ">Meet Our Team</h2>
                <p class="mt-4 text-lg sm:text-xl text-gray-600 leading-7 max-w-2xl mx-auto">
                    Kenali tim kami yang bekerja keras untuk menyediakan berita terbaik untuk Anda.
                </p>
            </div>
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 flex">
                @foreach ($teams as $t)
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
    @endsection --}}

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