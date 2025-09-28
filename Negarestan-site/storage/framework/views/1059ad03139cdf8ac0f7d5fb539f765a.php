

<?php $__env->startSection('content'); ?>
                    
                    <!-- Page Header & Breadcrumb -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-[var(--brand-blue)]">مدیریت مقالات</h1>
                            <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
                                <ol class="list-none p-0 inline-flex">
                                    <li class="flex items-center">
                                        <a href="admin-panel.html" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="text-gray-800">مقالات</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="<?php echo e(route('post.create')); ?>" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-5 rounded-lg hover:brightness-95 transition duration-300 shadow-md flex items-center">
                            <i class="fas fa-plus ml-2"></i>
                            <span>افزودن مقاله</span>
                        </a>
                    </div>

                    <!-- Posts Table -->
                    <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr class="text-right font-bold text-gray-600 border-b-2 border-gray-200">
                                    <th class="px-4 py-3">عنوان مقاله</th>
                                    <th class="px-4 py-3">نویسنده</th>
                                    <th class="px-4 py-3">دسته‌بندی</th>
                                    <th class="px-4 py-3">وضعیت</th>
                                    <th class="px-4 py-3">تاریخ انتشار</th>
                                    <th class="px-4 py-3">عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <?php
                                    // تابع کمکی برای تولید رنگ بر اساس یک رشته
                                    function getCategoryColorClass($categoryName) {
                                        $colors = ['red', 'yellow', 'green', 'blue', 'indigo', 'purple', 'pink'];
                                        $hash = crc32($categoryName);
                                        $color = $colors[$hash % count($colors)];
                                        return "bg-{$color}-100 text-{$color}-800";
                                    }
                                ?>

                                
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="px-4 py-4">
                                            <div class="flex items-center">
                                                <a href="#" target="_blank" class="text-gray-500 hover:text-[var(--brand-blue)] ml-2">
                                                    <i class="fas fa-external-link-alt"></i>
                                                </a>
                                                <span><?php echo e($post->title); ?></span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4"><?php echo e($post->author->name); ?></td>
                                        <td class="px-4 py-4">
                                            <?php if($post->category): ?>
                                                <?php
                                                    $color_class = getCategoryColorClass($post->category->name);
                                                ?>
                                                <span class="<?php echo e($color_class); ?> text-sm font-medium px-2.5 py-0.5 rounded"><?php echo e($post->category->name); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-4 py-4">
                                            <?php if($post->status == 'published'): ?>
                                                <span class="bg-green-100 text-green-800 text-sm font-medium px-2.5 py-0.5 rounded">انتشار</span>
                                            <?php else: ?>
                                                <span class="bg-gray-100 text-gray-800 text-sm font-medium px-2.5 py-0.5 rounded">پیش‌نویس</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="px-4 py-4"><?php echo e($post->published_at?jdate($post->published_at)->format('j F Y'):''); ?></td>
                                        <td class="px-4 py-4">
                                            <a href="<?php echo e(route('post.edit', $post->id)); ?>" class="text-[var(--brand-blue)] hover:text-blue-700 ml-4"><i class="fas fa-edit"></i></a>
                                            <a href="<?php echo e(route('post.toggle', $post->id)); ?>" class="text-[var(--brand-blue)] hover:text-blue-700 ml-4"><i class="fas fa-refresh"></i></a>
                                            <a href="<?php echo e(route('post.destroy', $post->id)); ?>" class="text-[var(--brand-blue)] hover:text-red-700"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\programming projects\laravel\negarestan\resources\views/panel/posts.blade.php ENDPATH**/ ?>