<!-- component -->
    <!-- Navigation starts -->
    <div id="mobile-nav" class="w-full xl:hidden h-full z-40 fixed">
        <div class="bg-gray-800 opacity-50 inset-0 fixed w-full h-full" onclick="sidebarHandler(false)"></div>
        <div class="w-64 absolute left-0 z-40 top-0 bg-white shadow flex-col justify-between transition duration-150 ease-in-out h-full">
            <div class="flex flex-col justify-between h-full">
                <div class="px-6 pt-4 overflow-y-auto">
                    <div class="flex items-center justify-between">
                        <a href="https://gatheringinbali.com">
                            <div aria-label="Home" role="img" class="flex items-center">

                                <img src="{{ asset('images/favicon.png') }}" alt="" class="h-8 w-8">
                                <p class="text-bold md:text2xl text-base pl-3 text-gray-800">GatheringInBali</p>
                            </div>
                        </a>
                        <button id="cross" class="hidden text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 rounded" onclick="sidebarHandler(false)">
                            <svg aria-label="close sidebar" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="18" y1="6" x2="6" y2="18" />
                                <line x1="6" y1="6" x2="18" y2="18" />
                            </svg>
                        </button>
                    </div>
                    <ul class="f-m-m">
                        {{-- <li class="hover:text-indigo-700 cursor-pointer h-full flex items-center text-sm tracking-normal {{ Route::is('home') ? 'border-b-2 border-indigo-700 text-indigo-700' : 'text-gray-800' }}"><a href="{{ route('home') }}">Home</a></li>
                        <li class="hover:text-indigo-700 cursor-pointer h-full flex items-center text-sm mx-10 tracking-normal {{ Route::is('bootcamp') ? 'border-b-2 border-indigo-700 text-indigo-700' : 'text-gray-800' }}"><a href="{{ route('events.index') }}">Events</a></li> --}}
                        <li class="{{ Route::is('home') ? 'text-indigo-500' : 'text-gray-800' }} pt-8">
                            <div class="flex items-center">
                                <div class="md:w-6 md:h-6 w-5 h-5 -mt-1">
                                    <i class="fa-solid fa-house "></i>
                                </div>
                                <a href="{{ route('home') }}" class="{{ Route::is('home') ? 'text-indigo-500' : 'text-gray-800' }} ml-3 text-lg">Home</a>
                            </div>
                        </li>
                        <li class="{{ Route::is('events.index') ? 'text-indigo-500' : 'text-gray-800' }} pt-8">
                            <div class="flex items-center">
                                <div class="md:w-6 md:h-6 w-5 h-5 -mt-1">
                                    {{-- <i class="fa-solid fa-house "></i>> --}}
                                    <i class="fa-solid fa-ticket rotate-45"></i>
                                    {{-- <i class="fa-solid fa-computer-classic"></i> --}}
                                </div>
                                <a href="{{ route('events.index') }}" class="{{ Route::is('events.index') ? 'text-indigo-500' : 'text-gray-800' }} ml-3 text-lg">Event</a>
                            </div>
                        </li>
                        {{-- <li class="{{ Route::is('events.index') ? 'text-indigo-500' : 'text-gray-800' }} pt-8">
                            <div class="flex items-center">
                                <div class="md:w-6 md:h-6 w-5 h-5 -mt-1">
                                </div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <i class="fa-solid fa-right-from-bracket ml-1"></i>
                                    <button type="submit" class="ml-2">Log Out</button>
                                </form>
                            </div>
                        </li> --}}
                        {{-- <li class="text-gray-700 pt-8">
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <div class="md:w-6 md:h-6 w-5 h-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                            <path
                                                d="M2.33333 4.83333H4.83333C5.05435 4.83333 5.26631 4.74554 5.42259 4.58926C5.57887 4.43298 5.66667 4.22101 5.66667 4V3.16667C5.66667 2.72464 5.84226 2.30072 6.15482 1.98816C6.46738 1.67559 6.89131 1.5 7.33333 1.5C7.77536 1.5 8.19928 1.67559 8.51184 1.98816C8.8244 2.30072 9 2.72464 9 3.16667V4C9 4.22101 9.0878 4.43298 9.24408 4.58926C9.40036 4.74554 9.61232 4.83333 9.83333 4.83333H12.3333C12.5543 4.83333 12.7663 4.92113 12.9226 5.07741C13.0789 5.23369 13.1667 5.44565 13.1667 5.66667V8.16667C13.1667 8.38768 13.2545 8.59964 13.4107 8.75592C13.567 8.9122 13.779 9 14 9H14.8333C15.2754 9 15.6993 9.17559 16.0118 9.48816C16.3244 9.80072 16.5 10.2246 16.5 10.6667C16.5 11.1087 16.3244 11.5326 16.0118 11.8452C15.6993 12.1577 15.2754 12.3333 14.8333 12.3333H14C13.779 12.3333 13.567 12.4211 13.4107 12.5774C13.2545 12.7337 13.1667 12.9457 13.1667 13.1667V15.6667C13.1667 15.8877 13.0789 16.0996 12.9226 16.2559C12.7663 16.4122 12.5543 16.5 12.3333 16.5H9.83333C9.61232 16.5 9.40036 16.4122 9.24408 16.2559C9.0878 16.0996 9 15.8877 9 15.6667V14.8333C9 14.3913 8.8244 13.9674 8.51184 13.6548C8.19928 13.3423 7.77536 13.1667 7.33333 13.1667C6.89131 13.1667 6.46738 13.3423 6.15482 13.6548C5.84226 13.9674 5.66667 14.3913 5.66667 14.8333V15.6667C5.66667 15.8877 5.57887 16.0996 5.42259 16.2559C5.26631 16.4122 5.05435 16.5 4.83333 16.5H2.33333C2.11232 16.5 1.90036 16.4122 1.74408 16.2559C1.5878 16.0996 1.5 15.8877 1.5 15.6667V13.1667C1.5 12.9457 1.5878 12.7337 1.74408 12.5774C1.90036 12.4211 2.11232 12.3333 2.33333 12.3333H3.16667C3.60869 12.3333 4.03262 12.1577 4.34518 11.8452C4.65774 11.5326 4.83333 11.1087 4.83333 10.6667C4.83333 10.2246 4.65774 9.80072 4.34518 9.48816C4.03262 9.17559 3.60869 9 3.16667 9H2.33333C2.11232 9 1.90036 8.9122 1.74408 8.75592C1.5878 8.59964 1.5 8.38768 1.5 8.16667V5.66667C1.5 5.44565 1.5878 5.23369 1.74408 5.07741C1.90036 4.92113 2.11232 4.83333 2.33333 4.83333"
                                                stroke="currentColor"
                                                stroke-width="1"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                    </div>

                                    <a href="javascript:void(0)" class="text-gray-700 ml-3 text-lg">Products</a>
                                </div>
                                <button id="chevronup" onclick="listHandler(true)" class="ml-4 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded">
                                    <svg aria-label="open products list" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down " width="14" height="14" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="6 9 12 15 18 9" />
                                    </svg>
                                </button>
                                <button id="chevrondown" onclick="listHandler(false)" class="hidden ml-4 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded ">
                                    <svg aria-label="close products list" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-up" width="14" height="14" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="6 15 12 9 18 15" />
                                    </svg>
                                </button>
                            </div>
                            <div id="list" class="hidden">
                                <ul class="my-3">
                                    <li class="text-sm text-indigo-500 py-2 px-6"><a href="javascript:void(0)"> Best Sellers </a></li>
                                    <li class="text-sm text-gray-800 hover:text-indigo-500 py-2 px-6"><a href="javascript:void(0)"> Out of Stock</a></li>
                                    <li class="text-sm text-gray-800 hover:text-indigo-500 py-2 px-6"><a href="javascript:void(0)"> New Products</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="text-gray-800 pt-8">
                            <div class="flex items-center">
                                <div class="md:w-6 md:h-6 w-5 h-5">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                        <path d="M6.66667 13.3333L8.33334 8.33334L13.3333 6.66667L11.6667 11.6667L6.66667 13.3333Z" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M10 17.5C14.1421 17.5 17.5 14.1421 17.5 10C17.5 5.85786 14.1421 2.5 10 2.5C5.85786 2.5 2.5 5.85786 2.5 10C2.5 14.1421 5.85786 17.5 10 17.5Z" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <a href="javascript:void(0)" class="text-gray-800 ml-3 text-lg">Performance</a>
                            </div>
                        </li>
                        <li class="text-gray-800 pt-8">
                            <div class="flex items-center">
                                <div class="flex items-center">
                                    <div class="md:w-6 md:h-6 w-5 h-5">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="none">
                                            <path d="M5.83333 6.66667L2.5 10L5.83333 13.3333" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M14.1667 6.66667L17.5 10L14.1667 13.3333" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M11.6667 3.33333L8.33333 16.6667" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <a href="javascript:void(0)" class="text-gray-800 ml-3 text-lg">Deliverables</a>
                                </div>
                                <div>
                                    <button id="chevronup2" onclick="listHandler2(true)" class="ml-4 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded">
                                        <svg aria-label="open deliverables list" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-down" width="14" height="14" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="6 9 12 15 18 9" />
                                        </svg>
                                    </button>
                                    <button id="chevrondown2" onclick="listHandler2(false)" class="hidden ml-4 focus:outline-none focus:ring-2 focus:ring-gray-500 rounded">
                                        <svg aria-label="open deliverables list" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-up" width="14" height="14" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="6 15 12 9 18 15" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div id="list2" class="hidden">
                                <ul class="my-3">
                                    <li class="text-sm text-indigo-500 py-2 px-6"><a href="javascript:void(0)"> Best Sellers </a></li>
                                    <li class="text-sm text-gray-800 hover:text-indigo-500 py-2 px-6"><a href="javascript:void(0)"> Out of Stock</a></li>
                                    <li class="text-sm text-gray-800 hover:text-indigo-500 py-2 px-6"><a href="javascript:void(0)"> New Products</a></li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
                <div class="w-full">
                    @guest
                    <div class="flex justify-center mb-4 w-full px-6">
                        <a href="{{ route('login') }}" class="bg-indigo-500 text-indigo-50 py-2 px-4 text-sm">Log in</a>
                    </div>
                    @endguest
                    @auth
                        @php
                            $carts = Auth::user()->carts;
                            $totalItems = 0;
                            foreach ($carts as $cart) {
                                foreach ($cart->Details as $detail) {
                                    $totalItems += $detail->quantity;
                                    // foreach ($detail->Options as $option) {
                                    //     $totalItems += $option->quantity;
                                    // }
                                }
                            }
                        @endphp
                        <div class="flex justify-center mb-4 w-full px-6">
                            {{-- <div class="relative w-full">
                                <div class="text-gray-600 absolute ml-4 inset-0 m-auto w-4 h-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="16" height="16" viewBox="0 0 24 24" stroke-width="1" stroke="#A0AEC0" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <circle cx="10" cy="10" r="7"></circle>
                                        <line x1="21" y1="21" x2="15" y2="15"></line>
                                    </svg>
                                </div>
                                <input class="focus:outline-none rounded w-full text-sm text-gray-500 placeholder-gray-600 bg-gray-100 pl-10 py-2" type="text" placeholder="Search" />
                            </div> --}}
                            <!-- component -->
                            {{-- <div class="relative py-2">
                                <div class="t-0 absolute left-3">
                                    <p class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">3</p>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                </svg>
                            </div> --}}
                        </div>
                        <div class="border-t border-gray-300">
                            <div class="w-full flex items-center justify-between px-6 pt-1">
                                <div class="flex items-center">
                                    {{-- <img alt="display avatar" role="img" src="https://tuk-cdn.s3.amazonaws.com/assets/components/boxed_layout/bl_1.png" class="w-8 h-8 rounded-md" /> --}}
                                    <p class="text-gray-800 text-base leading-4 ml-2">Jane Doe</p>
                                </div>
                                <ul class="flex">
                                    <li class="cursor-pointer text-white pt-4 pb-3">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf

                                            <button type="submit" class="text-gray-700"><i class="fa-solid fa-right-from-bracket ml-1 fa-lg"></i></button>
                                        </form>
                                    </li>
                                    <li class="cursor-pointer text-gray-700 pb-3 pl-3">
                                        <div class="relative lg:block">
                                            <a href="{{ route('cart.index') }}">
                                                <div class="-top-2 absolute left-3">
                                                    <p class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">{{ $totalItems }}</p>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <nav class="mx-auto bg-white shadow fixed z-10 w-full opacity-90">
        <div class="max-w-screen w-[90vw] container px-6 justify-between h-16 flex items-center lg:items-stretch mx-auto">
            <div class="h-full flex items-center">
                <div aria-label="Home" role="img" class="mr-10 flex items-center">
                    {{-- <svg  id="logo" enable-background="new 0 0 300 300" height="44" viewBox="0 0 300 300" width="43" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <path
                                fill="#4c51bf"
                                d="m234.735 35.532c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16zm0 24c-4.412 0-8-3.588-8-8s3.588-8 8-8 8 3.588 8 8-3.588 8-8 8zm-62.529-14c0-2.502 2.028-4.53 4.53-4.53s4.53 2.028 4.53 4.53c0 2.501-2.028 4.529-4.53 4.529s-4.53-2.027-4.53-4.529zm89.059 60c0 2.501-2.028 4.529-4.53 4.529s-4.53-2.028-4.53-4.529c0-2.502 2.028-4.53 4.53-4.53s4.53 2.029 4.53 4.53zm-40.522-5.459-88-51.064c-1.242-.723-2.773-.723-4.016 0l-88 51.064c-1.232.715-1.992 2.033-1.992 3.459v104c0 1.404.736 2.705 1.938 3.428l88 52.936c.635.381 1.35.572 2.062.572s1.428-.191 2.062-.572l88-52.936c1.201-.723 1.938-2.023 1.938-3.428v-104c0-1.426-.76-2.744-1.992-3.459zm-90.008-42.98 80.085 46.47-52.95 31.289-23.135-13.607v-21.713c0-2.209-1.791-4-4-4s-4 1.791-4 4v21.713l-26.027 15.309c-1.223.719-1.973 2.029-1.973 3.447v29.795l-52 30.727v-94.688zm0 198.707-80.189-48.237 51.467-30.412 24.723 14.539v19.842c0 2.209 1.791 4 4 4s4-1.791 4-4v-19.842l26.027-15.307c1.223-.719 1.973-2.029 1.973-3.447v-31.667l52-30.728v94.729z"
                            />
                        </g>
                    </svg> --}}
                    <a href="https://gatheringinbali.com" class="flex items-center" >
                        <img src="{{ asset('images/favicon.png') }}" alt="" class="h-8 w-8">
                        <h3 class="text-base text-gray-800 font-bold tracking-normal leading-tight ml-3 hidden lg:block">GatheringInBali</h3>
                    </a>
                </div>
                <ul class="pr-12 xl:flex items-center h-full hidden">
                    <li class="hover:text-indigo-700 cursor-pointer h-full flex items-center text-sm tracking-normal {{ Route::is('home') ? 'border-b-2 border-indigo-700 text-indigo-700' : 'text-gray-800' }}"><a href="{{ route('home') }}">Home</a></li>
                    <li class="hover:text-indigo-700 cursor-pointer h-full flex items-center text-sm mx-10 tracking-normal {{ Route::is('bootcamp') ? 'border-b-2 border-indigo-700 text-indigo-700' : 'text-gray-800' }}"><a href="{{ route('events.index') }}">Events</a></li>
                    {{-- <li class="hover:text-indigo-700 cursor-pointer h-full flex items-center text-sm mr-10 tracking-normal {{ Route::is('mini-event') ? 'border-b-2 border-indigo-700 text-indigo-700' : 'text-gray-800' }}"><a href="{{ route('mini-event') }}">Mini Event</a></li> --}}
                    {{-- <li class="hover:text-indigo-700 cursor-pointer h-full flex items-center text-sm tracking-normal"><a href="javascript:void(0)">Corporate Services</a></li> --}}
                </ul>
            </div>
            <div class="h-full xl:flex items-center justify-end hidden">
                <div class="w-full h-full flex items-center">
                    @guest()
                        <div class="w-full h-full flex items-center">
                            <a href="{{ route('login') }}" class="border-indigo-500 border-2 text-indigo-500 py-2 px-6 text-sm rounded-md mx-2">Log In</a>
                            <a href="{{ route('register') }}" class="bg-indigo-500 border-indigo-500 border-2 text-indigo-50 py-2 px-6 mx-2 text-sm rounded-md">Register</a>
                            {{-- <div class="w-full">
                                <a href="{{ route('register') }}" class="border-indigo-500 border-2 text-indigo-500 py-2 px-6 text-sm rounded-md">Sign Up</a>
                            </div> --}}
                        </div>
                    @endguest
                    @auth()
                        <div class="w-full h-full flex items-center border-r pr-8">
                            {{-- <div class="relative w-full mr-3">
                                <div class="text-gray-600 absolute ml-3 inset-0 m-auto w-4 h-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" />
                                        <circle cx="10" cy="10" r="7" />
                                        <line x1="21" y1="21" x2="15" y2="15" />
                                    </svg>
                                </div>
                                <input class="border border-gray-100 focus:outline-none focus:border-indigo-700 w-56 rounded text-sm text-gray-500 placeholder-gray-600 bg-gray-100 pl-8 py-2" type="text" placeholder="Search" />
                            </div> --}}
                            <!-- component -->
                            @php
                                $carts = Auth::user()->carts;
                                $totalItems = 0;
                                foreach ($carts as $cart) {
                                    foreach ($cart->Details as $detail) {
                                        $totalItems += $detail->quantity;
                                    }
                                }
                            @endphp

                            <div class="relative py-2 hidden lg:block">
                                <a href="{{ route('cart.index') }}">
                                    <div class="t-0 absolute left-3">
                                        <p class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white">{{ $totalItems }}</p>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                        <div class="w-full h-full flex min-w-fit mx-8">
                            {{-- <div class="w-32 h-full flex items-center justify-center border-r cursor-pointer text-gray-600"> --}}
                                {{-- <a aria-label="show notifications" role="link" href="javascript:void(0)" class="cursor-pointer w-6 h-6 xl:w-auto xl:h-auto text-gray-600">
                                    <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
                                        <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                                    </svg>
                                </a> --}}
                            {{-- </div> --}}
                            <div aria-haspopup="true" class="cursor-pointer w-full flex items-center justify-start relative" onclick="dropdownHandler(this)">
                                <button aria-haspopup="true" onclick="dropdownHandler(this)" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 rounded flex items-center" >
                                    {{-- <img class="rounded-full h-10 w-10 object-cover" src="https://tuk-cdn.s3.amazonaws.com/assets/components/sidebar_layout/sl_1.png" alt="avatar" /> --}}
                                    <p class="text-gray-800 text-sm">Hi, {{ Auth::user()->name }}</p>
                                </button>
                                <ul class="p-2 w-40 border-r bg-white absolute rounded z-40 left-0 shadow mt-44 hidden">
                                    {{-- <li class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-2 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" />
                                                <circle cx="12" cy="7" r="4" />
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                            </svg>
                                            <a href="javascript:void(0)" class="ml-2">My Profile</a>
                                        </div>
                                    </li> --}}
                                    {{-- <li class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal mt-2 py-2 hover:text-indigo-700 focus:text-indigo-700 focus:outline-none flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-help" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <circle cx="12" cy="12" r="9" />
                                            <line x1="12" y1="17" x2="12" y2="17.01" />
                                            <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" />
                                        </svg>
                                        <a href="javascript:void(0)" class="ml-2">Help Center</a>
                                    </li> --}}
                                    <li class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-1 my-1.5 hover:text-indigo-700 flex items-center focus:text-indigo-700 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        <a href="{{ route('user-dashboard.home') }}" class="ml-2">Dashboard</a>
                                    </li>
                                    <li class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-1 my-1.5 hover:text-indigo-700 flex items-center focus:text-indigo-700 focus:outline-none">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <i class="fa-solid fa-right-from-bracket ml-1"></i>
                                            <button type="submit" class="ml-2">Log Out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="visible xl:hidden flex items-center">
                <div>
                    <button id="menu" class="text-gray-800 rounded focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800" onclick="sidebarHandler(true) ">
                        <svg aria-label="open sidebar menu" xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="4" y1="6" x2="20" y2="6" />
                            <line x1="4" y1="12" x2="20" y2="12" />
                            <line x1="4" y1="18" x2="20" y2="18" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

<script>
    function dropdownHandler(element) {
        let single = element.getElementsByTagName("ul")[0];
        single.classList.toggle("hidden");
    }
    function MenuHandler(el, val) {
        let MainList = el.parentElement.getElementsByTagName("ul")[0];
        let closeIcon = el.parentElement.getElementsByClassName("close-m-menu")[0];
        let showIcon = el.parentElement.getElementsByClassName("show-m-menu")[0];
        if (val) {
            MainList.classList.remove("hidden");
            el.classList.add("hidden");
            closeIcon.classList.remove("hidden");
        } else {
            showIcon.classList.remove("hidden");
            MainList.classList.add("hidden");
            el.classList.add("hidden");
        }
    }
    let sideBar = document.getElementById("mobile-nav");
    let menu = document.getElementById("menu");
    let cross = document.getElementById("cross");
    sideBar.style.transform = "translateX(-100%)";
    const sidebarHandler = (check) => {
        if (check) {
            sideBar.style.transform = "translateX(0px)";
            menu.classList.add("hidden");
            cross.classList.remove("hidden");
        } else {
            sideBar.style.transform = "translateX(-100%)";
            menu.classList.remove("hidden");
            cross.classList.add("hidden");
        }
    };
    let list = document.getElementById("list");
    let chevrondown = document.getElementById("chevrondown");
    let chevronup = document.getElementById("chevronup");
    const listHandler = (check) => {
        if (check) {
            list.classList.remove("hidden");
            chevrondown.classList.remove("hidden");
            chevronup.classList.add("hidden");
        } else {
            list.classList.add("hidden");
            chevrondown.classList.add("hidden");
            chevronup.classList.remove("hidden");
        }
    };
    let list2 = document.getElementById("list2");
    let chevrondown2 = document.getElementById("chevrondown2");
    let chevronup2 = document.getElementById("chevronup2");
    const listHandler2 = (check) => {
        if (check) {
            list2.classList.remove("hidden");
            chevrondown2.classList.remove("hidden");
            chevronup2.classList.add("hidden");
        } else {
            list2.classList.add("hidden");
            chevrondown2.classList.add("hidden");
            chevronup2.classList.remove("hidden");
        }
    };
</script>
