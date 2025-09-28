

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-[var(--brand-blue)]"><?php echo e(isset($category) ? 'ویرایش دسته‌بندی' : 'افزودن دسته‌بندی جدید'); ?></h1>
        <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="<?php echo e(route('dashboards')); ?>" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                </li>
                <li class="mx-2 text-gray-400">/</li>
                <li class="flex items-center">
                    <a href="<?php echo e(route('post.list')); ?>" class="text-gray-500 hover:text-gray-700">نوشته ها</a>
                </li>
                <li class="mx-2 text-gray-400">/</li>
                <li class="text-gray-800"><?php echo e(isset($category) ? 'ویرایش' : 'دسته بندی'); ?></li>
            </ol>
        </nav>
    </div>
</div>


<div class="bg-white rounded-lg shadow-md p-6 lg:p-8 mb-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4"><?php echo e(isset($category) ? 'ویرایش دسته‌بندی' : 'افزودن دسته‌بندی جدید'); ?></h2>
    <form action="<?php echo e(isset($category) ? route('post.updateCategory', $category) : route('post.storeCategory')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php if(isset($category)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        
        <div class="space-y-4">
            
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">نام دسته‌بندی</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="<?php echo e(old('name', $category->name ?? '')); ?>"
                       class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="مثلا: آموزش"
                       required>
                <?php $__errorArgs = ['name'];
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
                <label for="slug" class="block text-sm font-bold text-gray-700 mb-2">اسلاگ (URL)</label>
                <input type="text"
                       id="slug"
                       name="slug"
                       value="<?php echo e(old('slug', $category->slug ?? '')); ?>"
                       class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                       placeholder="مثلا: amoozesh"
                       required>
                <?php $__errorArgs = ['slug'];
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
        
        <div class="flex justify-end items-center mt-6 pt-4 border-t border-gray-200">
            <button type="submit" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-6 rounded-lg hover:bg-yellow-500 transition-colors shadow-md">
                <?php echo e(isset($category) ? 'به‌روزرسانی' : 'ذخیره'); ?>

            </button>
        </div>
    </form>
</div>


<div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
    <h2 class="text-xl font-bold text-gray-800 mb-4">لیست دسته‌بندی‌ها</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tr-lg">نام</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">اسلاگ</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tl-lg">عملیات</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-5 border-b border-gray-200 text-sm"><?php echo e($category->name); ?></td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm ltr-text"><?php echo e($category->slug); ?></td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm text-center">
                        <div class="flex items-center justify-center space-x-2 space-x-reverse">
                            <a href="<?php echo e(route('post.category', ['category' => $category->id])); ?>" class="text-yellow-600 hover:text-yellow-800">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="<?php echo e(route('post.deleteCategory', $category)); ?>" method="POST" class="delete-form" data-name="<?php echo e($category->name); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="3" class="px-5 py-5 text-sm text-center text-gray-500">
                        هیچ دسته‌بندی‌ای یافت نشد.
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const itemTitle = this.dataset.name;
                Swal.fire({
                    title: 'آیا مطمئن هستید؟',
                    text: `آیتم "${itemTitle}" برای همیشه حذف خواهد شد!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'بله، حذف کن!',
                    cancelButtonText: 'خیر، منصرف شدم'
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit();
                    }
                });
            });
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('panel.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\programming projects\laravel\negarestan\resources\views/panel/postCategories.blade.php ENDPATH**/ ?>