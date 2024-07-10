@extends('layouts.app')

@section('content')
@php
    $dashboardRoute = '';
    if (auth()->check()) {
        $userRole = auth()->user()->role;
        if ($userRole === 'erlangga') {
            $dashboardRoute = route('dashboard.erlangga');
        } elseif ($userRole === 'hilmi') {
            $dashboardRoute = route('dashboard.hilmi');
        } else {
            $dashboardRoute = route('home'); // Default route if role not defined
        }
    }
@endphp

<div class="container mx-auto py-8">
  <div class="w-full mb-8">
      <div class="bg-white shadow-md rounded-lg">
          <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200">
              <h6 class="font-semibold text-gray-700">Manajemen Team</h6>
              <a href="/team/create" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add</a>
          </div>
          <div class="p-6 overflow-x-auto">
              <table class="min-w-full bg-white">
                  <thead>
                      <tr>
                          <th class="text-center text-gray-600 text-xs font-semibold uppercase tracking-wider">Image</th>
                          <th class="text-center text-gray-600 text-xs font-semibold uppercase tracking-wider">Name</th>
                          <th class="text-center text-gray-600 text-xs font-semibold uppercase tracking-wider">Position</th>
                          <th class="text-center text-gray-600 text-xs font-semibold uppercase tracking-wider">Action</th>
                      </tr>
                  </thead>
                  <tbody class="text-center">
                      @foreach ($team as $t)
                      <tr class="border-b border-gray-200">
                          <td class="px-4 py-2">
                              @if($t->image)
                              <a href="{{ asset('storage/' . $t->image) }}" data-lightbox="team-images">
                                  <img src="{{ asset('storage/' . $t->image) }}" class="rounded-full shadow w-24 h-24 object-cover mx-auto">
                              </a>
                              @else
                              <span>No Image</span>
                              @endif
                          </td>
                          <td class="px-4 py-2">{{ $t->name }}</td>
                          <td class="px-4 py-2">{{ $t->position }}</td>
                          <td class="px-4 py-2">
                              <div class="flex justify-center space-x-4">
                                  <a href="{{ route('team.edit', $t->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Edit</a>
                                  <form action="{{ route('team.destroy', $t->id) }}" method="POST" class="inline">
                                      @method('DELETE')
                                      @csrf
                                      <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                                  </form>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
      <div class="mt-4">
          <a href="{{ $dashboardRoute }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Back</a>
      </div>
  </div>
</div>

@endsection
