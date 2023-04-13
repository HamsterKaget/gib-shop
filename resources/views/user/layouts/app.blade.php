<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>@yield('title')</title>
        <!-- Tailwind CSS -->
        {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
        @vite('resources/css/app.css')
        <script src="https://kit.fontawesome.com/38ab242903.js" crossorigin="anonymous"></script>
        @stack('css')
    </head>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
        {{-- navbar --}}
        @include('user.partials.navbar')

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>

        <!-- Footer -->

        <!-- JavaScript -->
        <script src="{{ mix('js/app.js') }}"></script>
        @stack('js')
    </body>
</html>
