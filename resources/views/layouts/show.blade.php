<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Document</title>
</head>

<body class="bg-gradient-to-r from-black via-blue-900 to-purple-900">
    @if (Route::currentRouteName() === 'dashboard.erlangga' || 
    Route::currentRouteName() === 'dashboard.hilmi' ||
    Route::currentRouteName() === 'news.show')
    @include('layouts.app.navbar')
@endif

        @yield('content')
 


</body>

</html>