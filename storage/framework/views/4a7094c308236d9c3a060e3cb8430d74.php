<?php $__env->startSection('title', 'Gathering In Bali'); ?>

<?php $__env->startPush('css'); ?>
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <section id="hero" class="bg-indigo-50 p-8">
        <div class="container max-w-7xl mx-auto w-full h-full">
            <div class="grid grid-cols-7 items-center gap-3">
                <div class="col-span-7 md:col-span-4" data-aos="fade-right" data-aos-delay="0">
                    <h1 class="font-bold text-2xl md:text-3xl mb-4 md:mr-8">Transform Your Skills, Transform Your Future:<br/>Register Today for our Skill-Boosting Program!</h1>
                    <p class="mb-6 md:mr-8">Transforming your skills is the key to unlocking a world of new possibilities. Take charge of your future by enrolling in our skill-boosting program and let us guide you toward a pathway of growth and success.
                        <br><br>This is your ticket to unlocking your full potential and shaping a brighter future.</p>
                    <a href="#" class="mt-6 py-2 px-4 bg-indigo-500 text-white rounded-md shadow-lg">Register Free Account !</a>
                </div>
                <div class="col-span-7 md:col-span-3 hidden md:block" data-aos="fade-left" data-aos-delay="0">
                    <img src="/images/hero.jpg" alt="hero" class="h-auto brightness-75 rounded-lg shadow-md">
                </div>
            </div>
        </div>
    </section>

    <section id="bootcamp" class="p-8">
        <div class="container max-w-7xl mx-auto w-full h-full py-4 my-4">
            <h2 data-aos="fade-up" data-aos-delay="0" class="text-2xl font-bold text-center text-neutral-500 mb-3">
                Main Events
            </h2>
            <hr data-aos="fade-up" data-aos-delay="50">
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php $__currentLoopData = $main; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $startDate = \Carbon\Carbon::parse($program->start_date);
                        $isPastDate = $startDate->isPast();
                        $delay = ($index % 4) * 200; // Calculate the delay based on the current index
                    ?>
                    <a href="<?php echo e($isPastDate ? '#' : 'events/detail/'.$program->slug); ?>" class="block bg-white rounded-xl overflow-hidden shadow-lg<?php echo e($isPastDate ? ' grayscale' : ''); ?>" data-aos="fade-up" data-aos-delay="<?php echo e($delay); ?>">
                            
                                
                                <img class="h-54 w-full object-cover" src="<?php echo e(strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail)); ?>" alt="Card Image">
                                <div class="p-4">
                                    <div class="font-bold text-xl mb-2 line-clamp-2 <?php echo e($isPastDate ? 'text-slate-400' : ''); ?>"><?php echo e($program->title); ?></div>
                                    <p class="<?php echo e($isPastDate ? 'text-slate-400' : 'text-gray-700'); ?> text-base">
                                        <span id="date" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-calendar-days mr-2"></i> <?php echo e(date_format(date_create($program->start_date),"D, d M Y")); ?>

                                        </span>
                                        <span id="time" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-clock mr-2"></i> <?php echo e($program->time); ?>

                                        </span>
                                        <span id="price" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-tag mr-2"></i>
                                            <?php if($program->price == 0): ?>
                                                Free
                                            <?php else: ?>
                                                Rp. <?php echo e(number_format($program->price)); ?> / $ <?php echo e(number_format(($program->price / 15000))); ?>

                                            <?php endif; ?>
                                        </span>

                                    </p>
                                </div>
                                <?php if($isPastDate): ?>
                                    <span class="text-center uppercase transform inline-block py-1 w-full text-sm font-semibold text-red-100 bg-red-500 rounded mt-2.5"><?php echo e(__('Closed')); ?></span>
                                <?php endif; ?>
                            
                        </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="container max-w-7xl mx-auto w-full h-full py-4 my-4">
            <h2 data-aos="fade-up" data-aos-delay="0" class="text-2xl font-bold text-center text-neutral-500 mb-3">
                Mini Events
            </h2>
            <hr data-aos="fade-up" data-aos-delay="50">
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php $__currentLoopData = $mini; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $startDate = \Carbon\Carbon::parse($program->start_date);
                        $isPastDate = $startDate->isPast();
                        $delay = ($index % 4) * 200; // Calculate the delay based on the current index
                    ?>
                    <a href="<?php echo e($isPastDate ? '#' : 'events/detail/'.$program->slug); ?>" class="block bg-white rounded-xl overflow-hidden shadow-lg<?php echo e($isPastDate ? ' grayscale' : ''); ?>" data-aos="fade-up" data-aos-delay="<?php echo e($delay); ?>">
                            
                                
                                <img class="h-54 w-full object-cover" src="<?php echo e(strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail)); ?>" alt="Card Image">
                                <div class="p-4">
                                    <div class="font-bold text-xl mb-2 line-clamp-2 <?php echo e($isPastDate ? 'text-slate-400' : ''); ?>"><?php echo e($program->title); ?></div>
                                    <p class="<?php echo e($isPastDate ? 'text-slate-400' : 'text-gray-700'); ?> text-base">
                                        <span id="date" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-calendar-days mr-2"></i> <?php echo e(date_format(date_create($program->start_date),"D, d M Y")); ?>

                                        </span>
                                        <span id="time" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-clock mr-2"></i> <?php echo e($program->time); ?>

                                        </span>
                                        <span id="price" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-tag mr-2"></i>
                                            <?php if($program->price == 0): ?>
                                                Free
                                            <?php else: ?>
                                                Rp. <?php echo e(number_format($program->price)); ?> / $ <?php echo e(number_format(($program->price / 15000))); ?>

                                            <?php endif; ?>
                                        </span>

                                    </p>
                                </div>
                                <?php if($isPastDate): ?>
                                    <span class="text-center uppercase transform inline-block py-1 w-full text-sm font-semibold text-red-100 bg-red-500 rounded mt-2.5"><?php echo e(__('Closed')); ?></span>
                                <?php endif; ?>
                            
                        </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <div class="container max-w-7xl mx-auto w-full h-full py-4 my-4">
            <h2 data-aos="fade-up" data-aos-delay="0" class="text-2xl font-bold text-center text-neutral-500 mb-3">
                Free Events
            </h2>
            <hr data-aos="fade-up" data-aos-delay="50">
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php $__currentLoopData = $free; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $startDate = \Carbon\Carbon::parse($program->start_date);
                        $isPastDate = $startDate->isPast();
                        $delay = ($index % 4) * 200; // Calculate the delay based on the current index
                    ?>
                    <a href="<?php echo e($isPastDate ? '#' : 'events/detail/'.$program->slug); ?>" class="block bg-white rounded-xl overflow-hidden shadow-lg<?php echo e($isPastDate ? ' grayscale' : ''); ?>" data-aos="fade-up" data-aos-delay="<?php echo e($delay); ?>">
                            
                                
                                <img class="h-54 w-full object-cover" src="<?php echo e(strpos($program->thumbnail, 'images/Thumbnail') === 0 ? asset($program->thumbnail) : Storage::url($program->thumbnail)); ?>" alt="Card Image">
                                <div class="p-4">
                                    <div class="font-bold text-xl mb-2 line-clamp-2 <?php echo e($isPastDate ? 'text-slate-400' : ''); ?>"><?php echo e($program->title); ?></div>
                                    <p class="<?php echo e($isPastDate ? 'text-slate-400' : 'text-gray-700'); ?> text-base">
                                        <span id="date" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-calendar-days mr-2"></i> <?php echo e(date_format(date_create($program->start_date),"D, d M Y")); ?>

                                        </span>
                                        <span id="time" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-clock mr-2"></i> <?php echo e($program->time); ?>

                                        </span>
                                        <span id="price" class="block mb-1 text-sm">
                                            <i class="fa-solid fa-tag mr-2"></i>
                                            <?php if($program->price == 0): ?>
                                                Free
                                            <?php else: ?>
                                                Rp. <?php echo e(number_format($program->price)); ?> / $ <?php echo e(number_format(($program->price / 15000))); ?>

                                            <?php endif; ?>
                                        </span>

                                    </p>
                                </div>
                                <?php if($isPastDate): ?>
                                    <span class="text-center uppercase transform inline-block py-1 w-full text-sm font-semibold text-red-100 bg-red-500 rounded mt-2.5"><?php echo e(__('Closed')); ?></span>
                                <?php endif; ?>
                            
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

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/user/modules/home/index.blade.php ENDPATH**/ ?>