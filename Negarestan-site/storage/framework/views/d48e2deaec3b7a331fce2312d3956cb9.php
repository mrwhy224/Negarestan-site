<?php if($paginator->hasPages()): ?>
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        
        <div class="flex justify-between flex-1 sm:hidden">
            <?php if($paginator->onFirstPage()): ?>
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    قبلی
                </span>
            <?php else: ?>
                <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 transition ease-in-out duration-150">
                    قبلی
                </a>
            <?php endif; ?>

            <?php if($paginator->hasMorePages()): ?>
                <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 transition ease-in-out duration-150">
                    بعدی
                </a>
            <?php else: ?>
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    بعدی
                </span>
            <?php endif; ?>
        </div>

        
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    نمایش
                    <span class="font-medium"><?php echo e($paginator->firstItem()); ?></span>
                    تا
                    <span class="font-medium"><?php echo e($paginator->lastItem()); ?></span>
                    از
                    <span class="font-medium"><?php echo e($paginator->total()); ?></span>
                    نتیجه
                </p>
            </div>

            <div class="flex items-center space-x-1 space-x-reverse">
                
                <?php if($paginator->onFirstPage()): ?>
                    <span aria-disabled="true" aria-label="Previous" class="flex items-center justify-center w-10 h-10 rounded-md bg-gray-100 text-gray-400 border border-gray-300 cursor-not-allowed">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                <?php else: ?>
                    <a href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" class="flex items-center justify-center w-10 h-10 rounded-md bg-white text-gray-600 border border-gray-300 hover:bg-yellow-50 transition-colors" aria-label="Previous">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                <?php endif; ?>

                
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(is_string($element)): ?>
                        <span aria-disabled="true" class="flex items-center justify-center w-10 h-10 rounded-md bg-white text-gray-500 border border-gray-300">
                            <?php echo e($element); ?>

                        </span>
                    <?php endif; ?>

                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $paginator->currentPage()): ?>
                                <span aria-current="page" class="flex items-center justify-center w-10 h-10 rounded-md bg-[var(--brand-gold)] text-white font-bold border-2 border-yellow-400 shadow-sm">
                                    <?php echo e($page); ?>

                                </span>
                            <?php else: ?>
                                <a href="<?php echo e($url); ?>" class="flex items-center justify-center w-10 h-10 rounded-md bg-white text-gray-600 border border-gray-300 hover:bg-yellow-50 transition-colors" aria-label="Go to page <?php echo e($page); ?>">
                                    <?php echo e($page); ?>

                                </a>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <?php if($paginator->hasMorePages()): ?>
                    <a href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" class="flex items-center justify-center w-10 h-10 rounded-md bg-white text-gray-600 border border-gray-300 hover:bg-yellow-50 transition-colors" aria-label="Next">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                <?php else: ?>
                    <span aria-disabled="true" aria-label="Next" class="flex items-center justify-center w-10 h-10 rounded-md bg-gray-100 text-gray-400 border border-gray-300 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </nav>
<?php endif; ?>

<?php /**PATH D:\programming projects\laravel\negarestan\resources\views/vendor/pagination/tailwind.blade.php ENDPATH**/ ?>