<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/Stempel.ico') }}">
        <title>@yield('title')</title>
        <!-- Tailwind CSS -->
        @vite(['resources/css/app.css','resources/js/app.js'])
        @stack('css')
        <script src="https://kit.fontawesome.com/38ab242903.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
        {{-- navbar --}}
        @include('user.partials.new-navbar')
        <!-- Page Content -->
        <main class="min-h-screen">
            @yield('content')
        </main>

        <!-- Footer -->
        @include('user.partials.footer')

        <!-- JavaScript -->
        {{-- <script src="{{ mix('js/app.js') }}"></script> --}}
        <script src="/helper.js"></script>
        @stack('js')
    </body>
</html>
