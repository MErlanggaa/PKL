@extends('layouts.main')

@section('content')
<h3 class="text-4xl font-semibold mb-6 text-center p-8 shadow-md" > Management Artikel</h3> 

<div class="w-full px-6 py-6 mx-auto">
    <!-- table 1 -->

    <div class="flex flex-wrap -mx-3">
      <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
          <div class="flex justify-between items-center mb-4">
            <a href="{{ route('news.create') }}" class="bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">Create Article</a> 
        </div>
          <div class="flex-auto px-0 pt-0 pb-2">
            <div class="p-0 overflow-x-auto">
              <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                <thead class="align-bottom">
                    <tr>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Judul</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Tanggal</th>
                        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $news)
                        
                    
                  <tr>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <div class="flex px-2 py-1">
                        <div class="flex flex-col justify-center">
                          <h6 class="mb-0 text-sm leading-normal">{{ $news->judul }}</h6>
                        </div>
                      </div>
                    </td>
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <p class="mb-0 text-xs font-semibold leading-tight">{{ $news->tanggal }}</p>
                    </td>
                    <td class="p-2 bg-transparent border-b whitespace-nowrap shadow-transparent">
                      <a href="{{ route('news.edit', $news->id) }}" class="text-xs font-semibold leading-tight text-slate-400"> Edit </a>
                    </td>
              
                    <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                        <form action="{{ route('news.destroy', $news->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                      <button type="submit"  class="text-xs font-semibold leading-tight text-slate-400" onclick="return confirm('Are you sure you want to delete this news?')">Delete</button>
                    </form>
                    </td>
                  </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
