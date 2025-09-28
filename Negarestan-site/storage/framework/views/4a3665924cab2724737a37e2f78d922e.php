

<?php $__env->startSection('content'); ?>

                    <!-- Page Header & Breadcrumb -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-[var(--brand-blue)]">مدیریت  سوالات - آزمون <?php echo e($quiz->title); ?></h1>
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
                                    <li class="text-gray-800">سوالات</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="#" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-5 rounded-lg hover:brightness-95 transition duration-300 shadow-md flex items-center">
                            <i class="fas fa-plus ml-2"></i>
                            <span>افزودن سوال</span>
                        </a>
                    </div>

                    <!-- Articles Table -->
                    <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr class="text-right font-bold text-gray-600 border-b-2 border-gray-200">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">متن سوال</th>
                                    <th class="px-4 py-3">نوع</th>
                                    <th class="px-4 py-3">گزینه</th>
                                    <th class="px-4 py-3">  تاریخ ایجاد</th>
                                    <th class="px-4 py-3">عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                    
                                <?php $__empty_1 = true; $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $question): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="p-4"><?php echo e($question->id); ?></td>
                                        <td class="p-4"><?php echo e($question->text); ?></td>
                                        <td class="p-4"><?php echo e($question->type=='single'?'یک گزینه':'چند گزینه'); ?></td>
                                        <td class="p-4"><?php echo e($question->options_count); ?></td>
                                        <td class="p-4"><?php echo e(jdate($quiz->created_at)->format('j F Y')); ?></td>
                                        <td class="p-4">
                                            <a href="#" class="text-[var(--brand-blue)] hover:text-blue-500 ml-4"><i class="fas fa-eye"></i></a>
                                            <a href="#" class="text-[var(--brand-blue)] hover:text-blue-500 ml-4"><i class="fas fa-edit"></i></a>
                                            <a href="#" class="text-[var(--brand-blue)] hover:text-blue-500"><i class="fas fa-trash"></i></a>
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
                        <?php echo e($questions->links()); ?>

                    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\programming projects\laravel\negarestan\resources\views/panel/questions.blade.php ENDPATH**/ ?>