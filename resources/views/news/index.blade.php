@extends('layouts.main')

@section('content')
<div class="container mx-auto p-8">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-4xl font-semibold">Halo selamat datang, {{ Auth::user()->name }}</h2>
            <p class="text-2xl font-light">Role Yang Kamu Gunakan: {{ Auth::user()->role }}</p>
        </div>
        <h2 class="text-6xl font-semibold text-center flex-grow">Halaman Admin Panel!</h2>
    </div>

  
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

