

<?php $__env->startSection('content'); ?>
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-[var(--brand-blue)]"><?php echo e(isset($question) ? 'ویرایش سوال' : 'افزودن سوال جدید'); ?></h1>
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
                <li class="flex items-center">
                    <a href="<?php echo e(route('quiz.list')); ?>" class="text-gray-500 hover:text-gray-700">سوالات</a>
                </li>
                <li class="mx-2 text-gray-400">/</li>
                <li class="text-gray-800"><?php echo e(isset($question) ? 'ویرایش' : 'افزودن'); ?></li>
            </ol>
        </nav>
    </div>
</div>

    <div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
        
        <form id="question-form" action="<?php echo e(isset($question) ? route('quiz.updateQuestion', ['quiz' => $quiz->id, 'question' => $question->id]) : route('quiz.addQuestion', ['quiz' => $quiz->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="space-y-6">
                
                <div>
                    <label for="question_text" class="block text-sm font-bold text-gray-700 mb-2">متن سوال</label>
                    <textarea id="question_text"
                              name="question_text"
                              rows="4"
                              class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['question_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              placeholder="سوال را اینجا وارد کنید."
                              required><?php echo e(old('question_text', $question->text ?? '')); ?></textarea>
                    <?php $__errorArgs = ['question_text'];
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

                
                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="flex-grow">
                        <label for="question_type" class="block text-sm font-bold text-gray-700 mb-2">نوع پاسخ</label>
                        <select id="question_type"
                                name="question_type"
                                class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['question_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                required>
                            <option value="single" <?php echo e(old('question_type', $question->type ?? '') == 'single' ? 'selected' : ''); ?>>تک پاسخی</option>
                            <option value="multiple" <?php echo e(old('question_type', $question->type ?? '') == 'multiple' ? 'selected' : ''); ?>>چند پاسخی</option>
                        </select>
                        <?php $__errorArgs = ['question_type'];
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

                
                <div id="options-container" class="space-y-4">
                    <h3 class="text-lg font-bold text-gray-700">گزینه‌ها</h3>
                    <?php if(isset($question) && $question->options->count() > 0): ?>
                        <?php $__currentLoopData = $question->options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="option-row flex items-center space-x-2 space-x-reverse">
                                <input type="text" name="options[<?php echo e($index); ?>][text]" value="<?php echo e($option->text); ?>" class="w-full px-4 py-2 border rounded-lg bg-gray-50" placeholder="متن گزینه" required>
                                <button type="button" class="remove-option-btn text-red-500 hover:text-red-700 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1H9a1 1 0 00-1 1v3m4 0h-4"></path>
                                    </svg>
                                </button>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        
                        <div class="option-row flex items-center space-x-2 space-x-reverse">
                            <input type="text" name="options[0][text]" class="w-full px-4 py-2 border rounded-lg bg-gray-50" placeholder="متن گزینه" required>
                            <button type="button" class="remove-option-btn text-red-500 hover:text-red-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1H9a1 1 0 00-1 1v3m4 0h-4"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="option-row flex items-center space-x-2 space-x-reverse">
                            <input type="text" name="options[1][text]" class="w-full px-4 py-2 border rounded-lg bg-gray-50" placeholder="متن گزینه" required>
                            <button type="button" class="remove-option-btn text-red-500 hover:text-red-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1H9a1 1 0 00-1 1v3m4 0h-4"></path>
                                </svg>
                            </button>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="text-center">
                    <button type="button" id="add-option-btn" class="bg-gray-200 text-gray-700 font-bold py-2 px-6 rounded-lg hover:bg-gray-300 transition-colors">
                        افزودن گزینه جدید
                    </button>
                </div>
                <?php $__errorArgs = ['options'];
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
            
            <div class="flex justify-end items-center mt-8 pt-6 border-t border-gray-200">
                <a href="<?php echo e(route('quiz.list')); ?>" class="text-gray-600 font-bold py-2 px-5 rounded-lg hover:bg-gray-100 transition-colors">
                    انصراف
                </a>
                <button type="submit" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-6 rounded-lg hover:bg-yellow-500 transition-colors shadow-md">
                    <?php echo e(isset($question) ? 'به‌روزرسانی' : 'ذخیره'); ?>

                </button>
            </div>
        </form>
    </div>

    <script>
        const optionsContainer = document.getElementById('options-container');
        const addOptionBtn = document.getElementById('add-option-btn');
        const questionTypeSelect = document.getElementById('question_type');

        function reindexOptions() {
            const optionRows = optionsContainer.querySelectorAll('.option-row');
            optionRows.forEach((row, index) => {
                const textInput = row.querySelector('input[type="text"]');
                textInput.name = `options[${index}][text]`;
            });
        }
        
        optionsContainer.addEventListener('click', function(event) {
            if (event.target.closest('.remove-option-btn')) {
                const optionRow = event.target.closest('.option-row');
                if (optionsContainer.querySelectorAll('.option-row').length > 2) {
                    optionRow.remove();
                    reindexOptions();
                } else {
                    console.error('حداقل دو گزینه باید وجود داشته باشد.');
                }
            }
        });

        addOptionBtn.addEventListener('click', function() {
            const index = optionsContainer.querySelectorAll('.option-row').length;
            
            const newOption = `
                <div class="option-row flex items-center space-x-2 space-x-reverse">
                    <input type="text" name="options[${index}][text]" class="w-full px-4 py-2 border rounded-lg bg-gray-50" placeholder="متن گزینه" required>
                    <button type="button" class="remove-option-btn text-red-500 hover:text-red-700 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1H9a1 1 0 00-1 1v3m4 0h-4"></path>
                        </svg>
                    </button>
                </div>
            `;
            optionsContainer.insertAdjacentHTML('beforeend', newOption);
            reindexOptions();
        });
        
        reindexOptions();
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\programming projects\laravel\negarestan\resources\views/panel/questionAdd.blade.php ENDPATH**/ ?>