
<?php $__env->startPush('page_js'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteLinks = document.querySelectorAll('.delete-link');
            deleteLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const itemTitle = this.dataset.itemTitle;
                    const deleteUrl = this.href;
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
                            window.location.href = deleteUrl;
                        }
                    });
                });
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

                    <!-- Page Header & Breadcrumb -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-[var(--brand-blue)]">مدیریت آزمون ها</h1>
                            <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
                                <ol class="list-none p-0 inline-flex">
                                    <li class="flex items-center">
                                        <a href="<?php echo e(route('dashboards')); ?>" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="text-gray-800">آزمون ها</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="<?php echo e(route('quiz.add')); ?>" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-5 rounded-lg hover:brightness-95 transition duration-300 shadow-md flex items-center">
                            <i class="fas fa-plus ml-2"></i>
                            <span>افزودن آزمون</span>
                        </a>
                    </div>

                    <!-- Articles Table -->
                    <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr class="text-right font-bold text-gray-600 border-b-2 border-gray-200">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">  عنوان آزمون</th>
                                    <th class="px-4 py-3">سوالات</th>
                                    <th class="px-4 py-3">تعامل</th>
                                    <th class="px-4 py-3">  تاریخ ایجاد</th>
                                    <th class="px-4 py-3">عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php $__empty_1 = true; $__currentLoopData = $quizzes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quiz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="p-4"><?php echo e($quiz->id); ?></td>
                                        <td class="p-4"><?php echo e($quiz->title); ?></td>
                                        <td class="p-4"><?php echo e($quiz->questions_count); ?></td>
                                        <td class="p-4"><?php echo e($quiz->attempts_count); ?></td>
                                        <td class="p-4"><?php echo e(jdate($quiz->created_at)->format('j F Y')); ?></td>
                                        <td class="p-4">
                                            <a href="<?php echo e(route('quiz.question', ['quiz'=> $quiz->id])); ?>" class="text-[var(--brand-blue)] hover:text-blue-500 ml-4"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="text-[var(--brand-blue)] hover:text-blue-500 ml-4"><i class="fas fa-edit"></i></a>
                                            <a href="<?php echo e(route('quiz.delete', ['quiz'=> $quiz->id])); ?>" class="text-[var(--brand-blue)] hover:text-blue-500 delete-link" data-item-title="<?php echo e($quiz->title); ?>"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="p-6 text-center text-gray-500"> موردی یافت نشد! </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        <?php echo e($quizzes->links()); ?>

                    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\programming projects\laravel\negarestan\resources\views/panel/quiz.blade.php ENDPATH**/ ?>