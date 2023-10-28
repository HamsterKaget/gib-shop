<?php $__env->startSection('title', 'Gathering In Bali'); ?>

<?php $__env->startPush('css'); ?>
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    

    <section class="bg-white dark:bg-gray-900 bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern.svg')] dark:bg-[url('https://flowbite.s3.amazonaws.com/docs/jumbotron/hero-pattern-dark.svg')] py-20 sm:py-12 md:py-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 container mx-auto ">
            <div class="sm:px-16">
                <div class="py-8 px-4 mx-auto max-w-screen-xl lg:text-left text-center lg:py-16 z-10 relative">
                    <a href="#" class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-blue-700 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800">
                        <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">Promo</span> <span class="text-sm font-medium">Dive into our exclusive discount up to 40% for the upcoming event!</span>
                        <svg class="w-2.5 h-2.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                    </a>
                    <h1 class="mb-0.5 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Transform Your <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Skills</span></h1>
                    <h1 class="mb-2 text-2xl font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-5xl dark:text-white">Transform Your <span class="underline underline-offset-3 decoration-8 decoration-amber-400 dark:decoration-amber-600">Future</span></h1>
                    <p class="mb-3 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-200">
                        Transforming your skills is the key to unlocking a world of new possibilities. Take charge of your future by enrolling in our skill-boosting program and let us guide you toward a pathway of growth and success.
                        <br><br>This is your ticket to unlocking your full potential and shaping a brighter future.
                    </p>
                    <button
                        data-modal-target="register-modal"
                        data-modal-toggle="register-modal"
                        class="text-white px-4 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Register Now !</button>
                </div>
                
            </div>
            <div class="flex justify-center items-center order-first lg:order-last">
                <img class="h-auto lg:max-w-lg max-w-md w-52 sm:w-full rounded-lg rotate-3 brightness-75 shadow-md" src="<?php echo e(asset('images/hero.jpg')); ?>" alt="image description">
            </div>
        </div>

    </section>

    <section class="p-8 bg-white">
        <div class="container mx-auto w-full h-full py-4 my-4">
            <h2 data-aos="fade-up" data-aos-delay="0" class="text-2xl font-bold text-center text-neutral-500 mb-3">
                Main Events
            </h2>
            <hr data-aos="fade-up" data-aos-delay="50">
            <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-2 md:gap-4">
                <?php $__currentLoopData = $main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $startDate = \Carbon\Carbon::parse($program->start_date);
                        $isPastDate = $startDate->isPast();
                        $price = $program->price;

                        if (isset($program->Discount[0])) {
                            $discountedPrice = $program->Discount[0]->discount; // Initialize with the original price
                            $discountPercentage = $program->Discount[0]->percent; // Initialize with the original price
                        //     // dd($program->Discount);
                        //     $discountPercentage = $program->Discount[0]->discount; // Assuming you have the discount percentage
                        //     if ($discountPercentage) {
                        //         // Ensure the discount percentage is between 0 and 1 (e.g., 0.1 for 10%)
                        //         // dd('ada');
                        //         $discountedPrice = $price - ($price * ($discountPercentage / 100));
                        //     }
                        }


                        $delay = ($index % 5) * 200; // Calculate the delay based on the current index
                    ?>
                    <a href="<?php echo e($isPastDate ? '#' : 'events/detail/'.$program->slug); ?>" class="block bg-white rounded-xl overflow-hidden shadow-lg<?php echo e($isPastDate ? ' grayscale' : ''); ?>" data-aos="fade-up" data-aos-delay="<?php echo e($delay); ?>">
                            
                                
                                <img class="h-54 w-full object-cover" src="<?php echo e(strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail)); ?>" alt="Card Image">
                                <div class="p-4">
                                    <div class="font-medium text-xl mb-2 line-clamp-2 <?php echo e($isPastDate ? 'text-slate-400' : ''); ?>"><?php echo e($program->title); ?></div>
                                    <p id="price" class="block mb-1 text-sm font-bold">
                                        <i class="fa-solid fa-tag mr-1"></i>
                                        <?php if($program->price == 0): ?>
                                            Free
                                        <?php else: ?>
                                            <?php if(isset($program->Discount[0])): ?>
                                                <span class="font-bold text-base">
                                                    Rp. <?php echo e(number_format($discountedPrice)); ?> / $ <?php echo e(number_format(($discountedPrice / 15000))); ?>

                                                </span>
                                                <span class="flex justify-start items-center">
                                                    <span class="text-slate-400 line-through block text-xs">
                                                        Rp. <?php echo e(number_format($program->price)); ?> / $ <?php echo e(number_format(($program->price / 15000))); ?>

                                                    </span>
                                                    </span>
                                                    <span class="bg-red-100 mt-1 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-400 border border-gray-500">
                                                        
                                                        <svg class="w-3 h-3 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                            <path d="M18.435 7.546A2.32 2.32 0 0 1 17.7 5.77a3.354 3.354 0 0 0-3.47-3.47 2.322 2.322 0 0 1-1.776-.736 3.357 3.357 0 0 0-4.907 0 2.281 2.281 0 0 1-1.776.736 3.414 3.414 0 0 0-2.489.981 3.372 3.372 0 0 0-.982 2.49 2.319 2.319 0 0 1-.736 1.775 3.36 3.36 0 0 0 0 4.908A2.317 2.317 0 0 1 2.3 14.23a3.356 3.356 0 0 0 3.47 3.47 2.318 2.318 0 0 1 1.777.737 3.36 3.36 0 0 0 4.907 0 2.36 2.36 0 0 1 1.776-.737 3.356 3.356 0 0 0 3.469-3.47 2.319 2.319 0 0 1 .736-1.775 3.359 3.359 0 0 0 0-4.908ZM8.5 5.5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Zm3 9.063a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm2.207-6.856-6 6a1 1 0 0 1-1.414-1.414l6-6a1 1 0 0 1 1.414 1.414Z"/>
                                                        </svg>
                                                        <span class="ml-0.5">
                                                            Discount <?php echo e(number_format($discountPercentage)); ?>%
                                                        </span>
                                                    </span>
                                            <?php else: ?>
                                                <span class="font-bold text-base">
                                                    Rp. <?php echo e(number_format($price)); ?> / $ <?php echo e(number_format(($price / 15000))); ?>

                                                </span>
                                                
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </p>
                                    <p class="<?php echo e($isPastDate ? 'text-slate-400' : 'text-gray-700'); ?> text-base">
                                        
                                            <span id="date" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-calendar-days mr-1"></i> <?php echo e(date_format(date_create($program->start_date),"d M Y")); ?>

                                            </span>
                                            <span id="time" class="block mb-1 text-sm">
                                                <i class="fa-solid fa-clock mr-1"></i> <?php echo e($program->time); ?>

                                            </span>
                                            
                                        
                                    </p>
                                </div>
                                
                                
                            
                        </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
<script>
var swiper = new Swiper('.swiper-container', {
    // Optional parameters
    loop: true,
    autoplay: {
        delay: 5000,
    },
});
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hamsterkaget/Development/Web-App/gib-shop/resources/views/user/modules/home/index.blade.php ENDPATH**/ ?>