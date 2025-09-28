

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-[var(--brand-blue)]"><?php echo e(isset($quiz) ? 'ویرایش آزمون' : 'افزودن آزمون جدید'); ?></h1>
        <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="<?php echo e(route('dashboards')); ?>" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                </li>
                <li class="mx-2 text-gray-400">/</li>
                <li class="flex items-center">
                    <a href="<?php echo e(route('quiz.list')); ?>" class="text-gray-500 hover:text-gray-700">آزمون ها</a>
                </li>
                <li class="mx-2 text-gray-400">/</li>
                <li class="text-gray-800"><?php echo e(isset($quiz) ? 'ویرایش' : 'افزودن'); ?></li>
            </ol>
        </nav>
    </div>
</div>

    
    <div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
        
        <form action="<?php echo e(isset($quiz) ? route('quiz.update', $quiz) : route('quiz.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            
            <?php if(isset($quiz)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <div class="space-y-6">
                
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">عنوان آزمون</label>
                    <input type="text"
                               id="title"
                               name="title"
                               value="<?php echo e(old('title', $quiz->title ?? '')); ?>"
                               class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                               placeholder="مثلا: آزمون جامع مرحله اول"
                               required>

                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                
                
                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">توضیحات</label>
                    <textarea id="description"
                              name="description"
                              rows="4"
                              class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              placeholder="توضیحات مربوط به آزمون را اینجا وارد کنید."><?php echo e(old('description', $quiz->description ?? '')); ?></textarea>

                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-2"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
            <div class="flex justify-end items-center mt-8 pt-6 border-t border-gray-200">
                <a href="<?php echo e(route('quiz.list')); ?>" class="text-gray-600 font-bold py-2 px-5 rounded-lg hover:bg-gray-100 transition-colors">
                    انصراف
                </a>
                <button type="submit" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-6 rounded-lg hover:bg-yellow-500 transition-colors shadow-md">
                    <?php echo e(isset($quiz) ? 'به‌روزرسانی' : 'ذخیره'); ?>

                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\programming projects\laravel\negarestan\resources\views/panel/quizAdd.blade.php ENDPATH**/ ?>