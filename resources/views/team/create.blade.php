@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg">
        <div class="bg-white shadow-md rounded-lg p-6 mb-4">
            <h3 class="text-2xl font-semibold text-center mb-4">Add Team</h3>
            <form class="form" action="{{ route('team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-bold mb-2">CHOOSE IMAGE</label>
                    <input type="file" class="block w-full text-gray-700 border rounded py-2 px-3 leading-tight focus:outline-none focus:bg-white" id="image" name="image" required>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="name" required>
                </div>
                <div class="mb-4">
                    <label for="position" class="block text-gray-700 text-sm font-bold mb-2">Position</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="position" name="position" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include SweetAlert -->
@include('sweetalert::alert')

@endsection
