@extends('layouts.mainn')
@section('content')
<div id="berita" class="container px-6 sm:contain-none py-96">
    @foreach ($news as $item)
        
    <div class="mt-4 border flex flex-col sm:flex-row border-gray-300 rounded-lg sm:p-6 h-80 sm:h-44 sm:items-center sm:space-x-10 max-w-xl mx-auto">
        <div >
            <img class="p-7 sm:p-0 rounded-full w-36 h-36 sm:w-20 sm:h-20 object-cover" id="croppedImage" src="{{ asset($item->foto) }}"
                alt="">
        </div>
        <div class="px-7 sm:px-0">
            <h2 class="text-base font-normal opacity-80 tracking-widest text-gray-700">{{ $item->judul }}</h2>
            <p class="text-gray-500 text-sm pb-4 my-3">
                {{ $item->tanggal }}, {{ optional($item->created_at)->format('M d, Y') }}
            </p>
            <a href="{{ route('news.show', $item->id) }}"
                class="bg-purple-100 hover:bg-purple-200 transition-all duration-700 rounded-full px-4 py-2.5 text-purple-900 font-semibold"> Baca Berita</a>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('card')
@foreach ( $news as $item )
<div id="info" class="relative my-24 text-white mx-5 py-6 sm:mx-32">
    <img class="sm:rounded-[40px] object-cover rounded-3xl w-[382px] h-[722px] sm:w-full sm:h-[500px]" id="croppedImage" src="{{ asset($item->foto) }}">
    <div class="absolute inset-0 top-16 left-3 sm:left-11 px-7">
        <p class="opacity-60 tracking-widest rounded">info</p>
        <h1 class="text-3xl sm:text-5xl text-purple-100 font-judul">{{ $item->judul }}<br><span class="text-purple-400"> {{ $item->judul }}</span></h1>
        <p class="pt-7 text-sm mr-9 sm:mr-0 sm:text-base font-semibold sm:font-normal">{{ $item->tanggal }}, {{ optional($item->created_at)->format('M d, Y') }}        </p>
       
        <a href="{{ route('news.show', $item->id) }}"
            class="border border-white text-white rounded-full py-2 px-4 text-sm font-bold hover:bg-purple-100 hover:text-black transition duration-300">
            Learn More</a>
    </div>
</div>
@endforeach
@endsection

@section("sponsor")
<div id="sponsor">
<div class="">
    <h1 class="text-4xl sm:text-5xl text-center font-bold pt-4 mb-20">Sponsor<br class="hidden sm:block">website</h1>
</div>
<div class="grid grid-cols-2 sm:grid-cols-6 container px-7 sm:px-24  mb-12 space-x-9 items-center ">
    <img src="/assets/company/ventures.svg" alt="">
    <img src="/assets/company/cherubick.svg" alt="">
    <img src="/assets/company/northzone.svg" alt="">
    <img src="/assets/company/placeholder.svg" alt="">
    <img src="/assets/company/lightSpeed.svg" alt="">
    <img src="/assets/company/svAngel.svg" alt="">
</div>
<div class="grid grid-cols-2 sm:grid-cols-7 container px-7 sm:px-24 justify-center space-x-11 items-center ">
    <img src="/assets/company/socialCapital.svg" alt="">
    <img src="/assets/company/digitalGroup.svg" alt="">
    <img src="/assets/company/coindFund.svg" alt="">
    <img src="/assets/company/voltcapital.svg" alt="">
    <img src="/assets/company/tiger.svg" alt="">
    <img src="/assets/company/synchcrony.svg" alt="">
    <img src="/assets/company/kx.svg" alt="">
</div>
</div>
@endsection
@section('team')
@foreach ($tim as $t)
<div id="team">
<div class="">
    <h1 class="text-4xl sm:text-5xl text-center font-bold pt-52">Our<br class="hidden sm:block">Team</h1>
</div>
<div class="flex py-32 space-x-8 mb-11 justify-center ">
    <div class="flex border py-1 rounded-full">
        <div class="items-center ml-2">
            <img loading="lazy" class="rounded-full w-12 h-12" src="{{ asset('storage/' . $t->image) }}" alt="Avatar">
        </div>
        <div class="mx-5">
            <h2 class="font-bold text-gray-800 text-base">{{ $t ->name }}</h2>
            <p class="text-gray-600text-xs">{{ $t->position }}</p>
        </div>
    </div>
  
</div>
</div>
@endforeach

@endsection