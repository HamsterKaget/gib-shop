<?php $__env->startSection('title'); ?>
        <?php echo e("Buy Ticket " . $program->title . " | GatheringInBali"); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"
/>
<style>

</style>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>
    <div class="min-h-screen bg-sky-100 mx-auto h-full">
        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-left lg:hidden mt-12"><?php echo e($program->title); ?></h1>
        <div class="grid max-w-[1980px] overflow-x-hidden -space-x-3 grid-cols-1 xl:grid-cols-2">
            <div class="py-8">
                <div class="md:flex mx-auto lg:max-w-[650px] max-w-[90vw]">
                    <div class="md:w-4/10">
                        <div class="swiper mySwiper2 lg:max-w-[650px] max-w-[90vw]">
                            <div class="swiper-wrapper">
                                <?php if($program->thumbnail): ?>
                                <div class="swiper-slide">
                                    
                                    <img class="lg:max-h-[512px] sm:max-h-[85vh] max-h-[90vw] rounded-lg mx-auto" src="<?php echo e(strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail)); ?>" alt="<?php echo e($program->title); ?>">
                                </div>
                                <?php endif; ?>
                                <?php if($program->Image->isNotEmpty()): ?>
                                    <?php $__currentLoopData = $program->Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="swiper-slide">
                                        <img class="lg:max-h-[512px] sm:max-h-[85vh] max-h-[90vw] rounded-lg mx-auto" src="<?php echo e(asset($image->image)); ?>" alt="<?php echo e($program->title); ?>">
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                            <div class="swiper-button-next hidden md:block"></div>
                            <div class="swiper-button-prev hidden md:block"></div>
                        </div>
                        <div thumbsSlider="" class="swiper mySwiper" style="max-width: 500px; margin-top: 15px;">
                            <div class="swiper-wrapper">
                                <?php if($program->thumbnail): ?>
                                <div class="swiper-slide">
                                    <img class="max-h-56 rounded-lg" src="<?php echo e(strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail)); ?>" alt="<?php echo e($program->title); ?>">
                                </div>
                                <?php endif; ?>
                                <?php if($program->Image->isNotEmpty()): ?>
                                <?php $__currentLoopData = $program->Image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide">
                                    <img class="max-h-56 p-2 rounded-lg" src="<?php echo e(asset($image->image)); ?>" alt="<?php echo e($program->title); ?>">
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="py-4 mb-12">
                <div class="md:grid max-w-[90vw] mx-auto grid-cols-1">
                    <div class="mt-4 mx-2 md:mt-0">
                        <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-left hidden lg:block"><?php echo e($program->title); ?></h1>
                        <div class="md:grid md:grid-cols-2">
                            <div class="mt-4 md:mt-8 w-full lg:w-9/12 mx-auto md:mx-0 md:mr-auto rounded-lg bg-slate-50 shadow-lg p-4">
                                
                                <h5 class="font-bold text-lg mb-2 text-center uppercase">Detail Information</h5>
                                <hr>
                                <div class="my-auto">
                                    <div class="my-4 flex items-start flex-col space-y-2">
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-location-dot"></i>
                                            <span class="ml-1.5">
                                                <?php echo e($program->location); ?>

                                            </span>
                                        </span>
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-calendar"></i>
                                            <span class="ml-1.5">
                                                <?php echo e(date_format(date_create($program->start_date),"D, d M Y")); ?>

                                            </span>
                                        </span>
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-calendar"></i>
                                            <span class="ml-1.5">
                                                <?php echo e(date_format(date_create($program->end_date),"D, d M Y")); ?>

                                            </span>
                                        </span>
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-clock"></i>
                                            <span class="ml-1.5">
                                                <?php echo e($program->time); ?> </td>
                                            </span>
                                        </span>
                                    </div>
                                    <hr>
                                    <div class="mt-4 flex items-start flex-col space-y-2">
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <i class="fa-solid fa-cube"></i>
                                            <span class="ml-1.5">
                                                <?php echo e(number_format($program->stock)); ?> Left
                                            </span>
                                        </span>
                                        
                                        <?php
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
                                        ?>
                                            <?php if(isset($program->Discount[0])): ?>
                                                <span class="bg-red-100 text-red-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-red-700 dark:text-red-400 border border-gray-500">
                                                    <i class="fa-solid fa-tags"></i>
                                                    <span class="ml-1.5">
                                                        Rp <?php echo e(number_format($discountedPrice)); ?>

                                                        /
                                                        $ <?php echo e(number_format(($discountedPrice / 15000))); ?>

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
                                                <span class="opacity-60 line-through bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                                    <i class="fa-solid fa-tags"></i>
                                                    <span class="ml-1.5">
                                                        Rp <?php echo e(number_format($program->price)); ?>

                                                        /
                                                        $ <?php echo e(number_format(($program->price / 15000))); ?>

                                                    </span>
                                                </span>
                                                <?php else: ?>
                                                <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                                    <i class="fa-solid fa-tags"></i>
                                                    <span class="ml-1.5">
                                                        Rp <?php echo e(number_format($program->price)); ?>

                                                        /
                                                        $ <?php echo e(number_format(($program->price / 15000))); ?>

                                                    </span>
                                                </span>
                                            <?php endif; ?>
                                            
                                        
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="w-full lg:w-9/12 mx-auto md:ml-4 lg:mr-auto lg:-ml-16">
                                <?php if($program->Option->isNotEmpty()): ?>
                                    <div class="mt-4 md:mt-8 w-full rounded-lg bg-slate-50 shadow-lg p-4">
                                        <h5 class="font-bold text-lg mb-2 text-center uppercase">Choose Variant</h5>
                                        <hr>
                                        <div class="my-4"></div>
                                        <form action="<?php echo e(route('cart.add', $program->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="program_id" value="<?php echo e($program->id); ?>">
                                            <?php $__currentLoopData = $program->Option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label for="option_value_id_<?php echo e($option->id); ?>" class="block my-2 mx-2 text-sm font-medium text-gray-900">
                                                    <?php echo e($option->options); ?>

                                                </label>
                                                <input type="hidden" name="options[<?php echo e($option->id); ?>][id]" value="<?php echo e($option->id); ?>">
                                                <select required name="options[<?php echo e($option->id); ?>][value_id]" id="option_value_id_<?php echo e($option->id); ?>" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5s">
                                                    <option value="" selected>Choose an option</option>
                                                    <?php if($option->Value->isNotEmpty()): ?>
                                                        <?php $__currentLoopData = $option->Value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($value->id); ?>"><?php echo e($value->value); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php endif; ?>
                                                </select>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(auth()->guard()->guest()): ?>
                                                <a href="<?php echo e(route('login')); ?>" class="block text-center bg-emerald-500 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300 text-slate-50 py-2 px-3 w-full mt-4 shadow-lg rounded-lg">Login to Continue</a>
                                            <?php endif; ?>
                                            <?php if(auth()->guard()->check()): ?>
                                                <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300 text-slate-50 py-2 px-3 w-full mt-4 shadow-lg rounded-lg"><i class="fa-solid fa-cart-shopping"></i>+</button>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <div class="mt-4 md:mt-8 w-full rounded-lg bg-slate-50 shadow-lg p-4">
                                        <h5 class="font-bold text-lg mb-2 text-center uppercase">Product Options</h5>
                                        <hr>
                                        <div class="my-4"></div>
                                        <form action="<?php echo e(route('cart.add', $program->id)); ?>" method="POST">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="program_id" value="<?php echo e($program->id); ?>">
                                            <?php $__currentLoopData = $program->Option; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <label for="option_value_id_<?php echo e($option->id); ?>" class="block my-2 mx-2 text-sm font-medium text-gray-900">
                                                    Select an <?php echo e($option->name); ?>

                                                </label>
                                                <input type="hidden" name="options[<?php echo e($option->id); ?>][id]" value="<?php echo e($option->id); ?>">
                                                <select name="options[<?php echo e($option->id); ?>][value_id]" id="option_value_id_<?php echo e($option->id); ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5s">
                                                    <option value="" selected>Choose an option</option>
                                                    <?php $__currentLoopData = $option->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($value->id); ?>"><?php echo e($value->value); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(auth()->guard()->guest()): ?>
                                                <a href="<?php echo e(route('login')); ?>" class="block text-center bg-emerald-500 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300 text-slate-50 py-2 px-3 w-full mt-4 shadow-lg rounded-lg">Login to Continue</a>
                                            <?php endif; ?>
                                            <?php if(auth()->guard()->check()): ?>
                                                    <button type="submit" class="bg-emerald-500 hover:bg-emerald-600 hover:-translate-y-1 transition-all duration-300 text-slate-50 py-2 px-3 w-full mt-4 shadow-lg rounded-lg">
                                                        <i class="fa-solid fa-cart-shopping"></i> Add to cart
                                                    </button>
                                            <?php endif; ?>
                                        </form>


                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="mt-4 mx-2 md:mt-0 w-full">
                        <div class="title">
                            <h5 class="font-bold text-slate-800 text-xl text-center lg:text-left my-4">Description</h5>
                        </div>
                        <div class="lg:pr-8">
                            <?php echo $program->description; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<!-- Swiper JS -->

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".mySwiper", {
        spaceBetween: 5,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
            slidesPerView: 3,
            spaceBetween: 5
            },
            // when window width is >= 480px
            480: {
            slidesPerView: 3,
            spaceBetween:5
            },
            // when window width is >= 640px
            640: {
            slidesPerView: 4,
            spaceBetween: 10
            }
        }
    });
    var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 5,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hamsterkaget/Development/Web-App/gib-shop/resources/views/user/modules/bootcamp/detail.blade.php ENDPATH**/ ?>