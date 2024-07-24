@extends('layouts.show')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 flex">
    <!-- Main Content -->
    <div class="w-3/4 pr-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <img id="croppedImage" src="{{ asset($news->foto) }}" class="w-full h-auto object-cover mb-4" style="height: 400px" alt="{{ $news->judul }}" />

            <div class="flex justify-between items-center mb-4">
                <h2 class="text-3xl font-bold">{{ $news->judul }}</h2>
                <p class="text-sm text-gray-600">{{ $news->tanggal }}, {{ optional($news->created_at)->format('M d, Y') }}</p>
            </div>

            <p class="mt-4 leading-relaxed">{!! $news->isi !!}</p>
            
        </div>
    </div>

    <!-- Sidebar -->
    <div class="w-1/4">
        @include('layouts.bar.sidebar')
    </div>

</div>
@endsection


