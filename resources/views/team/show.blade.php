@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 flex">
    @foreach ($show as $i)
    <!-- Main Content -->
    <div class="flex-1 pl-8 pr-8">
        <div class="bg-white p-6 rounded-lg shadow flex items-center">
            <img src="{{ asset('storage/' . $i->image) }}" class="w-24 h-24 object-cover rounded-full mr-4" alt="Profile Image">
    
            <div>
                <h5 class="text-2xl font-bold mb-2">{{ $i->name }}</h5>
                <p class="text-sm text-gray-600">{{ $i->position }}</p>
            </div>
        </div>
    </div>
     @endforeach
@endsection
