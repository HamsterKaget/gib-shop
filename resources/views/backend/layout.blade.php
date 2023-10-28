<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- <meta charset="utf-8"> --}}
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Shop Gathering in Bali | Dashboard')</title>

        @vite(['resources/css/app.css','resources/js/app.js'])

        @stack('pre-css')
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        @stack('post-css')
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>


    <body class=" bg-slate-50">
        @include('backend.layout.sidebar')

        @yield('content')


        @stack('pre-js')
        <script src="/helper.js"></script>
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script> --}}
        @stack('post-js')
      </body>
</html>
