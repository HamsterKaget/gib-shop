<!-- Navbar goes here -->
{{-- <nav class="bg-bublegum shadow-lg py-1"> --}}
<nav class="bg-white shadow-lg py-1 fixed top-0 left-0 w-full z-50 opacity-90 backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-8">
        <div class="flex justify-between">
            <div class="flex w-full">
                <div>
                    <!-- Website Logo -->
                    <a href="#" class="flex items-center py-4 px-2">
                        <span class="font-semibold text-indigo-600 text-lg">GatheringInBali</span>
                        {{-- <img src="logo.png" alt="Logo" class="h-8 w-8 mr-2"> --}}
                    </a>
                </div>
                <!-- Primary Navbar items -->
                {{-- <div class="hidden md:flex items-center space-x-1"> --}}
                {{-- </div> --}}
                <!-- Secondary Navbar items -->
                <div class="hidden md:flex items-center space-x-3 ml-auto">
                    {{-- <a href="{{ route('home') }}" class="py-4 px-2 border-indigo-600 font-semibold  {{  Route::is('home') ? 'border-b-2 text-indigo-600' : 'text-slate-700' }}">Home</a> --}}
                    {{-- <a href="{{ route('program') }}" class="py-4 px-2 border-indigo-600 font-semibold hover:text-indigo-600 transition duration-300 {{  Route::is('program') ? 'border-b-2 text-indigo-600' : 'text-slate-700' }}">Bootcamp & Program</a> --}}
                    <a href="" class="py-4 px-2 text-slate-700 font-semibold hover:text-indigo-600 transition duration-300">Mini Event</a>
                    <a href="" class="py-4 px-2 text-slate-700 font-semibold hover:text-indigo-600 transition duration-300">Corporate Services</a>
                    <a href="" class="py-4 px-2 text-slate-700 font-semibold hover:text-indigo-600 transition duration-300">Other</a>
                    <a href="{{ route('login') }}" class="py-1.5 px-4 ml-4 font-medium text-indigo-600 rounded hover:bg-indigo-600 hover:text-white transition duration-300 border-2 border-indigo-600">Log In</a>
                    <a href="" class="py-1.5 px-4 font-medium text-white bg-indigo-600 rounded border-2 border-indigo-600 transition duration-300">Sign Up</a>
                </div>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                <svg class=" w-6 h-6 text-slate-700 hover:text-indigo-600 "
                    x-show="!showMenu"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            </div>
        </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="text-center">
            <li class="active"><a href="index.html" class="block text-sm px-2 py-4 hover:text-white hover:bg-indigo-600 font-semibold">Home</a></li>
            <li><a href="#services" class="block hover:text-white text-sm px-2 py-4 hover:bg-indigo-600 transition font-semibold duration-300">Services</a></li>
            <li><a href="#about" class="block hover:text-white text-sm px-2 py-4 hover:bg-indigo-600 transition font-semibold duration-300">About</a></li>
            <li><a href="#contact" class="block hover:text-white text-sm px-2 py-4 hover:bg-indigo-600 transition font-semibold duration-300">Contact Us</a></li>
        </ul>
    </div>
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</nav>
