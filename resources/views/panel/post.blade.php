@extends('panel.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-[var(--brand-blue)]">{{ isset($post) ? 'ویرایش مقاله' : 'افزودن مقاله جدید' }}</h1>
            <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
                <ol class="list-none p-0 inline-flex">
                    <li class="flex items-center">
                        <a href="{{ route('dashboards') }}" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                    </li>
                    <li class="mx-2 text-gray-400">/</li>
                    <li class="flex items-center">
                        <a href="{{ route('post.list') }}" class="text-gray-500 hover:text-gray-700">مقالات</a>
                    </li>
                    <li class="mx-2 text-gray-400">/</li>
                    <li class="text-gray-800">{{ isset($post) ? 'ویرایش' : 'افزودن' }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
        <form id="post-form" action="{{ isset($post) ? route('post.update', ['post' => $post->id]) : route('post.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($post))
                @method('PUT')
            @endif

            <div class="space-y-6">
                <!-- فیلد عنوان -->
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">عنوان مقاله</label>
                    <input type="text" id="title" name="title" value="{{ old('title', $post->title ?? '') }}"
                           class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('title') border-red-500 @enderror"
                           placeholder="مثلا: نکات طلایی برای یادگیری لاراول" required>
                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- فیلد اسلاگ -->
                <div>
                    <label for="slug" class="block text-sm font-bold text-gray-700 mb-2">اسلاگ (URL)</label>
                    <input type="text" id="slug" name="slug" value="{{ old('slug', $post->slug ?? '') }}"
                           class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('slug') border-red-500 @enderror"
                           placeholder="مثلا: best-laravel-tips" required>
                    @error('slug')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- فیلد دسته بندی -->
                <div>
                    <label for="post_category_id" class="block text-sm font-bold text-gray-700 mb-2">دسته‌بندی</label>
                    <select id="post_category_id" name="post_category_id"
                            class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('post_category_id') border-red-500 @enderror" required>
                        <option value="">دسته‌بندی را انتخاب کنید</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('post_category_id', $post->post_category_id ?? '') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('post_category_id')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- فیلد چکیده -->
                <div>
                    <label for="excerpt" class="block text-sm font-bold text-gray-700 mb-2">چکیده</label>
                    <textarea id="excerpt" name="excerpt" rows="3"
                              class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('excerpt') border-red-500 @enderror"
                              placeholder="خلاصه‌ای از محتوای مقاله را بنویسید." required>{{ old('excerpt', $post->excerpt ?? '') }}</textarea>
                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- بخش آپلود تصویر شاخص -->
                <div>
                    <label for="image_upload" class="block text-sm font-bold text-gray-700 mb-2">تصویر شاخص</label>
                    <div class="image-upload-wrapper" onclick="document.getElementById('image_upload').click()">
                        <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-2"></i>
                        <span class="text-gray-600">برای آپلود کلیک کنید یا فایل را به اینجا بکشید.</span>
                        <input type="file" id="image_upload" name="image" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </div>
                    @if(isset($post) && $post->image)
                        <div class="mt-4 flex items-center space-x-4 space-x-reverse">
                            <img id="image_preview" src="{{ Storage::url($post->image) }}" alt="تصویر شاخص فعلی" class="w-32 h-32 object-cover rounded-lg shadow-md">
                            <span class="text-gray-500">تصویر فعلی</span>
                        </div>
                    @else
                        <div class="mt-4 hidden" id="image_preview_container">
                            <img id="image_preview" src="#" alt="پیش‌نمایش تصویر" class="w-32 h-32 object-cover rounded-lg shadow-md">
                        </div>
                    @endif
                    @error('image')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Editor.js container -->
                <div class="mt-8">
                    <label class="block text-sm font-bold text-gray-700 mb-2">محتوای مقاله</label>
                    <div class="editorjs-container">
                        <div id="editorjs"></div>
                    </div>
                    <!-- Hidden input to store Editor.js content -->
                    <input type="hidden" name="content" id="editorjs_content" value="{{ old('content', $post->content ?? '') }}">
                    @error('content')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end items-center mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('post.list') }}" class="text-gray-600 font-bold py-2 px-5 rounded-lg hover:bg-gray-100 transition-colors">
                    انصراف
                </a>
                <button type="submit" class="bg-yellow-400 text-white font-bold py-2 px-6 rounded-lg hover:bg-yellow-500 transition-colors shadow-md">
                    {{ isset($post) ? 'به‌روزرسانی' : 'ذخیره' }}
                </button>
            </div>
        </form>
    </div>
@endsection

@push('page_js')
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
@endpush
