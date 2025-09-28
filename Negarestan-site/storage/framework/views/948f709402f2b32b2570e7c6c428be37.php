

<?php $__env->startSection('content'); ?>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-[var(--brand-blue)]"><?php echo e(isset($post) ? 'ویرایش مقاله' : 'افزودن مقاله جدید'); ?></h1>
            <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="<?php echo e(route('dashboards')); ?>" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                    </li>
                    <li class="mx-2 text-gray-400">/</li>
                    <li class="flex items-center">
                        <a href="<?php echo e(route('post.list')); ?>" class="text-gray-500 hover:text-gray-700">مقالات</a>
                    </li>
                    <li class="mx-2 text-gray-400">/</li>
                    <li class="text-gray-800"><?php echo e(isset($post) ? 'ویرایش' : 'افزودن'); ?></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
        <form id="post-form" action="<?php echo e(isset($post) ? route('post.update', ['post' => $post->id]) : route('post.store')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php if(isset($post)): ?>
                <?php echo method_field('PUT'); ?>
            <?php endif; ?>

            <div class="space-y-6">
                <!-- فیلد عنوان -->
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">عنوان مقاله</label>
                    <input type="text" id="title" name="title" value="<?php echo e(old('title', $post->title ?? '')); ?>"
                           class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           placeholder="مثلا: نکات طلایی برای یادگیری لاراول" required>
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

                <!-- فیلد اسلاگ -->
                <div>
                    <label for="slug" class="block text-sm font-bold text-gray-700 mb-2">اسلاگ (URL)</label>
                    <input type="text" id="slug" name="slug" value="<?php echo e(old('slug', $post->slug ?? '')); ?>"
                           class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           placeholder="مثلا: best-laravel-tips" required>
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

                <!-- فیلد دسته بندی -->
                <div>
                    <label for="post_category_id" class="block text-sm font-bold text-gray-700 mb-2">دسته‌بندی</label>
                    <select id="post_category_id" name="post_category_id"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['post_category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <option value="">دسته‌بندی را انتخاب کنید</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(old('post_category_id', $post->post_category_id ?? '') == $category->id ? 'selected' : ''); ?>>
                                <?php echo e($category->name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php $__errorArgs = ['post_category_id'];
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

                <!-- فیلد چکیده -->
                <div>
                    <label for="excerpt" class="block text-sm font-bold text-gray-700 mb-2">چکیده</label>
                    <textarea id="excerpt" name="excerpt" rows="3"
                              class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 <?php $__errorArgs = ['excerpt'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              placeholder="خلاصه‌ای از محتوای مقاله را بنویسید." required><?php echo e(old('excerpt', $post->excerpt ?? '')); ?></textarea>
                    <?php $__errorArgs = ['excerpt'];
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

                <!-- بخش آپلود تصویر شاخص -->
                <div>
                    <label for="image_upload" class="block text-sm font-bold text-gray-700 mb-2">تصویر شاخص</label>
                    <div class="image-upload-wrapper" onclick="document.getElementById('image_upload').click()">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <span class="text-gray-600">برای آپلود کلیک کنید یا فایل را به اینجا بکشید.</span>
                        <input type="file" id="image_upload" name="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <?php if(isset($post) && $post->image): ?>
                        <div class="mt-4 flex items-center space-x-4 space-x-reverse">
                            <img id="image_preview" src="<?php echo e(Storage::url($post->image)); ?>" alt="تصویر شاخص فعلی" class="w-32 h-32 object-cover rounded-lg shadow-md">
                            <span class="text-gray-500">تصویر فعلی</span>
                        </div>
                    <?php else: ?>
                        <div class="mt-4 hidden" id="image_preview_container">
                            <img id="image_preview" src="#" alt="پیش‌نمایش تصویر" class="w-32 h-32 object-cover rounded-lg shadow-md">
                        </div>
                    <?php endif; ?>
                    <?php $__errorArgs = ['image'];
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

                <!-- Editor.js container -->
                <div class="mt-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">محتوای مقاله</label>
                    <div class="editorjs-container">
                        <div id="editorjs"></div>
                    </div>
                    <!-- Hidden input to store Editor.js content -->
                    <input type="hidden" name="content" id="editorjs_content" value="<?php echo e(old('content', $post->content ?? '')); ?>">
                    <?php $__errorArgs = ['content'];
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
                <a href="<?php echo e(route('post.list')); ?>" class="text-gray-600 font-bold py-2 px-5 rounded-lg hover:bg-gray-100 transition-colors">
                    انصراف
                </a>
                <button type="submit" class="bg-yellow-400 text-white font-bold py-2 px-6 rounded-lg hover:bg-yellow-500 transition-colors shadow-md">
                    <?php echo e(isset($post) ? 'به‌روزرسانی' : 'ذخیره'); ?>

                </button>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('page_js'); ?>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/delimiter@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/editorjs-button@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/list@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/quote@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/image@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/simple-image@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>
<script src="https://cdn.jsdelivr.net/npm/@editorjs/embed@latest"></script>
<script>
    const editor = new EditorJS({
        holder: 'editorjs',

        // RTL and Persian Language Configuration
        i18n: {
            direction: 'rtl',
             messages: {
                ui: {
                    "blockTunes": {
                        "toggler": {
                            "Click to tune": "برای تنظیم کلیک کنید",
                            "or drag to move": "یا برای جابجایی بکشید"
                        }
                    },
                    "inlineToolbar": {
                        "converter": {
                            "Convert to": "تبدیل به"
                        }
                    },
                    "toolbar": {
                        "toolbox": {
                            "Add": "افزودن",
                            "Filter": "جستجو..."
                        }
                    },
                    "popover": {
                        "Filter": "جستجو...",
                        "Nothing found": "چیزی یافت نشد"
                    }
                },
                toolNames: {
                    "Text": "متن",
                    "Heading": "تیتر",
                    "List": "لیست",
                    "Quote": "نقل قول",
                    "Table": "جدول",
                    "Image": "تصویر",
                    "Embed": "جاسازی",
                    "Bold": "ضخیم",
                    "Italic": "کج",
                    "Link": "لینک"
                },
                tools: {
                    "list": {
                        "Ordered": "لیست عددی",
                        "Unordered": "لیست نقطه‌ای"
                    },
                    "link": {
                        "Add a link": "افزودن لینک"
                    },
                    "stub": {
                        'The block can not be displayed correctly.': 'این بلوک به درستی نمایش داده نمی‌شود.'
                    }
                },
                blockTunes: {
                    "delete": {
                        "Delete": "حذف",
                        "Click to delete": "برای حذف کلیک کنید"
                    },
                    "moveUp": {
                        "Move up": "انتقال به بالا"
                    },
                    "moveDown": {
                        "Move down": "انتقال به پایین"
                    }
                },
            }
        },

        // Tools Configuration
        tools: {
            AnyButton: {
                class: AnyButton,
                inlineToolbar: false,
                config:{
                    css:{
                        "btnColor": "btn--gray",
                    },
                    textValidation: (text) => {
                        console.log("error!", text)
                        return true;
                    }
                }
            },
            delimiter: Delimiter,
            header: {
                class: Header,
                inlineToolbar: true,
                config: {
                    placeholder: 'تیتر را وارد کنید',
                    levels: [2, 3, 4],
                    defaultLevel: 2
                }
            },

            quote: {
                class: Quote,
                inlineToolbar: true,
                config: {
                    quotePlaceholder: 'متن نقل قول را وارد کنید',
                    captionPlaceholder: 'نویسنده نقل قول',
                },
            },
            image: {
                class: ImageTool,
                config: {
                    // You need to implement an uploader on your backend
                    uploader: {
                        uploadByFile(file){
                            // your upload logic here
                            // For now, we return a fake success response
                            return new Promise((resolve) => {
                                resolve({
                                    success: 1,
                                    file: {
                                        url: 'https://placehold.co/600x400/69a297/ffffff?text=Uploaded',
                                    }
                                });
                            });
                        },
                        uploadByUrl(url){
                            // your upload logic here
                            return new Promise((resolve) => {
                                resolve({
                                    success: 1,
                                    file: {
                                        url: url,
                                    }
                                });
                            });
                        }
                    }
                }
            },
            table: {
                class: Table,
                inlineToolbar: true,
            },
            embed: Embed,
        },

        // Placeholder for the editor
        placeholder: 'شروع به نوشتن کنید...',
    });

    document.getElementById('post-form').addEventListener('submit', function(e) {
        e.preventDefault();
        editor.save().then((outputData) => {
            document.getElementById('editorjs_content').value = JSON.stringify(outputData);
            this.submit();
        }).catch((error) => {
            console.log('Saving failed: ', error);
        });
    });

    function previewImage(event) {
        const previewContainer = document.getElementById('image_preview_container');
        const previewImage = document.getElementById('image_preview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewContainer.classList.remove('hidden');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('panel.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\programming projects\laravel\negarestan\resources\views/panel/post.blade.php ENDPATH**/ ?>