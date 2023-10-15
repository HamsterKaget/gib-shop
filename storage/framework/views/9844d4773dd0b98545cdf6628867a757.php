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

                                <img src="<?php echo e(asset('images/favicon.png')); ?>" alt="" class="h-8 w-8">
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
                        
                        <li class="<?php echo e(Route::is('home') ? 'text-indigo-500' : 'text-gray-800'); ?> pt-8">
                            <div class="flex items-center">
                                <div class="md:w-6 md:h-6 w-5 h-5 -mt-1">
                                    <i class="fa-solid fa-house "></i>
                                </div>
                                <a href="<?php echo e(route('home')); ?>" class="<?php echo e(Route::is('home') ? 'text-indigo-500' : 'text-gray-800'); ?> ml-3 text-lg">Home</a>
                            </div>
                        </li>
                        <li class="<?php echo e(Route::is('events.index') ? 'text-indigo-500' : 'text-gray-800'); ?> pt-8">
                            <div class="flex items-center">
                                <div class="md:w-6 md:h-6 w-5 h-5 -mt-1">
                                    
                                    <i class="fa-solid fa-ticket rotate-45"></i>
                                    
                                </div>
                                <a href="<?php echo e(route('events.index')); ?>" class="<?php echo e(Route::is('events.index') ? 'text-indigo-500' : 'text-gray-800'); ?> ml-3 text-lg">Event</a>
                            </div>
                        </li>
                        
                        
                    </ul>
                </div>
                <div class="w-full">
                    <?php if(auth()->guard()->guest()): ?>
                    <div class="flex justify-center mb-4 w-full px-6">
                        <a href="<?php echo e(route('login')); ?>" class="bg-indigo-500 text-indigo-50 py-2 px-4 text-sm">Log in</a>
                    </div>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php
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
                        ?>
                        <div class="flex justify-center mb-4 w-full px-6">
                            
                            <!-- component -->
                            
                        </div>
                        <div class="border-t border-gray-300">
                            <div class="w-full flex items-center justify-between px-6 pt-1">
                                <div class="flex items-center">
                                    
                                    <p class="text-gray-800 text-base leading-4 ml-2">Jane Doe</p>
                                </div>
                                <ul class="flex">
                                    <li class="cursor-pointer text-white pt-4 pb-3">
                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>

                                            <button type="submit" class="text-gray-700"><i class="fa-solid fa-right-from-bracket ml-1 fa-lg"></i></button>
                                        </form>
                                    </li>
                                    <li class="cursor-pointer text-gray-700 pb-3 pl-3">
                                        <div class="relative lg:block">
                                            <a href="<?php echo e(route('cart.index')); ?>">
                                                <div class="-top-2 absolute left-3">
                                                    <p class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white"><?php echo e($totalItems); ?></p>
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
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile -->
    

    <nav class="mx-auto bg-white shadow fixed z-10 w-full opacity-90">
        <div class="max-w-screen w-[90vw] container px-6 justify-between h-16 flex items-center lg:items-stretch mx-auto">
            <div class="h-full flex items-center">
                <div aria-label="Home" role="img" class="mr-10 flex items-center">
                    
                    <a href="https://gatheringinbali.com" class="flex items-center" >
                        <img src="<?php echo e(asset('images/favicon.png')); ?>" alt="" class="h-8 w-8">
                        <h3 class="text-base text-gray-800 font-bold tracking-normal leading-tight ml-3 hidden lg:block">GatheringInBali</h3>
                    </a>
                </div>
                <ul class="pr-12 xl:flex items-center h-full hidden">
                    <li class="hover:text-indigo-700 cursor-pointer h-full flex items-center text-sm tracking-normal <?php echo e(Route::is('home') ? 'border-b-2 border-indigo-700 text-indigo-700' : 'text-gray-800'); ?>"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                    <li class="hover:text-indigo-700 cursor-pointer h-full flex items-center text-sm mx-10 tracking-normal <?php echo e(Route::is('bootcamp') ? 'border-b-2 border-indigo-700 text-indigo-700' : 'text-gray-800'); ?>"><a href="<?php echo e(route('events.index')); ?>">Events</a></li>
                    
                    
                </ul>
            </div>
            <div class="h-full xl:flex items-center justify-end hidden">
                <div class="w-full h-full flex items-center">
                    <?php if(auth()->guard()->guest()): ?>
                        <div class="w-full h-full flex items-center">
                            <a href="<?php echo e(route('login')); ?>" class="border-indigo-500 border-2 text-indigo-500 py-2 px-6 text-sm rounded-md mx-2">Log In</a>
                            <a href="<?php echo e(route('register')); ?>" class="bg-indigo-500 border-indigo-500 border-2 text-indigo-50 py-2 px-6 mx-2 text-sm rounded-md">Register</a>
                            
                        </div>
                    <?php endif; ?>
                    <?php if(auth()->guard()->check()): ?>
                        <div class="w-full h-full flex items-center border-r pr-8">
                            
                            <!-- component -->
                            <?php
                                $carts = Auth::user()->carts;
                                $totalItems = 0;
                                foreach ($carts as $cart) {
                                    foreach ($cart->Details as $detail) {
                                        $totalItems += $detail->quantity;
                                    }
                                }
                            ?>

                            <div class="relative py-2 hidden lg:block">
                                <a href="<?php echo e(route('cart.index')); ?>">
                                    <div class="t-0 absolute left-3">
                                        <p class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white"><?php echo e($totalItems); ?></p>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="file: mt-4 h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                                    </svg>
                                </a>
                            </div>

                        </div>
                        <div class="w-full h-full flex min-w-fit mx-8">
                            
                                
                            
                            <div aria-haspopup="true" class="cursor-pointer w-full flex items-center justify-start relative" onclick="dropdownHandler(this)">
                                <button aria-haspopup="true" onclick="dropdownHandler(this)" class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-800 rounded flex items-center" >
                                    
                                    <p class="text-gray-800 text-sm">Hi, <?php echo e(Auth::user()->name); ?></p>
                                </button>
                                <ul class="p-2 w-40 border-r bg-white absolute rounded z-40 left-0 shadow mt-44 hidden">
                                    
                                    
                                    <li class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-1 my-1.5 hover:text-indigo-700 flex items-center focus:text-indigo-700 focus:outline-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" />
                                            <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                            <circle cx="12" cy="12" r="3" />
                                        </svg>
                                        <a href="<?php echo e(route('user-dashboard.home')); ?>" class="ml-2">Dashboard</a>
                                    </li>
                                    <li class="cursor-pointer text-gray-600 text-sm leading-3 tracking-normal py-1 my-1.5 hover:text-indigo-700 flex items-center focus:text-indigo-700 focus:outline-none">
                                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                                            <?php echo csrf_field(); ?>
                                            <i class="fa-solid fa-right-from-bracket ml-1"></i>
                                            <button type="submit" class="ml-2">Log Out</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
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
    <!-- Navigation ends -->
    
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
<?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/user/partials/navbar.blade.php ENDPATH**/ ?>