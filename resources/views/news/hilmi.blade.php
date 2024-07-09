@extends('layouts.app')

@section('hero')

    <div class="relative bg-cover bg-center bg-no-repeat h-96">
        <div class="bg-black bg-opacity-50 h-full flex items-center">
            <div class="mx-auto max-w-7xl text-center text-white">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight">Welcome To The News Portal</h1>
                <p class="mt-4 text-lg sm:text-xl">Find the latest and most trusted news here.</p>
            </div>
        </div>
    </div> 
    <script src="{{ asset('/assets/js/script.js') }}"></script>
@endsection

@section('about')
    <div class="bg-gray-100 py-12 sm:py-20">
        <div class="mx-auto max-w-7xl px-6 lg:px-8 text-center">
            <div class="max-w-2xl mx-auto">
                <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight text-gray-900">About As</h2>
                <p class="mt-4 text-lg sm:text-xl text-gray-600 leading-7">
                    Behind the success of News Portal, there is a passionate and experienced team, ready to provide the best for you. We are a diverse group of individuals, with different backgrounds but one common vision: to provide the latest and most trusted news information to our readers.
                </p>
            </div>
        </div>
    </div>
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
                            <img src="{{ asset('storage/' . $item->foto) }}" class="h-64 w-full object-cover" />
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
<div class="py-20 bg-gray-50">
    @foreach ($tim as $t)
    <div class="container mx-auto px-6 md:px-12 xl:px-32">
        <div class="mb-16 text-center">
            <h2 class="mb-4 text-center text-2xl text-gray-900 font-bold md:text-4xl">Meet Our Team</h2>
            <p class="text-gray-600 lg:w-8/12 lg:mx-auto">Each member of our team is not only experienced in their field, but also committed to making meaningful contributions</p>
        </div>
        <div class="grid gap-12 items-center md:grid-cols-3">
            <div class="space-y-4 text-center">
                <img src="{{ asset('storage/' . $t->image) }}" alt="woman" loading="lazy" width="640" height="805">
                <div>
                    <h4 class="text-2xl">{{ $t->name }}</h4>
                    <h6 class="block text-sm text-gray-500">{{ $t->position }}</h6>
                </div>
            </div>

        </div>
    </div>
</div>@endforeach
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
