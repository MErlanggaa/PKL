@extends('layouts.app')

@section('content')
<h3 class="text-4xl font-semibold mb-6 text-center p-8 shadow-md" > Management Artikelw</h3> 

<div class="container mx-auto p-2">
    <div class="bg-white shadow-2xl rounded-lg p-6 mt-8">
        <h2 class="text-2xl font-semibold mb-4 text-center">News List</h2>

        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('news.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create Article</a>
            
            <form action="{{ route('news.search') }}" method="GET" class="flex items-center">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search..." class="border rounded-l-md px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-r-md">Search</button>
            </form>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="w-1/3 px-4 py-2">Judul</th>
                        <th class="w-1/3 px-4 py-2">Tanggal</th>
                        <th class="w-1/3 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach($data as $news)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $news->judul }}</td>
                            <td class="px-4 py-2">{{ $news->tanggal }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('news.edit', $news->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-3 rounded">Edit</a>
                                <form action="{{ route('news.destroy', $news->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded" onclick="return confirm('Are you sure you want to delete this news?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection
