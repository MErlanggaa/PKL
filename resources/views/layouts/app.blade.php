<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if (in_array(Route::currentRouteName(), ['news.create', 'news.edit']))
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/cropperjs/dist/cropper.min.js"></script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> 
</head>
<body>

@if (!in_array(Route::currentRouteName(), ['news.create', 'news.edit','dashboard.erlangga','dashboard.hilmi','news.show']))
    @include('layouts.bar.navbar')
@endif

@if (Route::currentRouteName() === 'dashboard.erlangga' || 
     Route::currentRouteName() === 'dashboard.hilmi' ||
     Route::currentRouteName() === 'news.show')
     @include('layouts.bar.navbaruser')
@endif
<div class="row">
  @yield('hero')
@yield('about')
    @yield('content')
@yield('team')
@yield('contact')

</div>

@if (!in_array(Route::currentRouteName(), ['news.create', 'news.edit' , 'news.search','team.index','news.show','news']))
@include('layouts.bar.footer')
 
@endif

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>

@yield('scripts')

</body>
</html>