<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>مقاله: {{ $post->title }}</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* تعریف متغیرهای رنگی جدید */
        :root {
            --brand-gold: #f5b301;
            --brand-blue: #12324c;
        }
        /* استفاده از فونت‌های فارسی */
        body {
            font-family: 'Vazirmatn', sans-serif;
            scroll-behavior: smooth;
            overflow-x: hidden;
        }
        h1, h2, h3, .fantasy-font {
            font-family: 'Lalezar', cursive;
        }
        .brand-blue-gradient {
            background: -webkit-linear-gradient(45deg, var(--brand-blue), #2c5282);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        /* استایل‌های Editor.js برای فرمت‌دهی محتوا */
        .post-content h1, .post-content h2, .post-content h3 {
            margin-top: 1.5rem;
            margin-bottom: 0.75rem;
            font-weight: 800;
        }
        .post-content p {
            margin-bottom: 1rem;
            line-height: 2;
            text-align: justify;
        }
        .post-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.75rem;
            margin: 1.5rem auto;
            display: block;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        .post-content ul, .post-content ol {
            margin-right: 1.5rem;
            list-style-position: inside;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Header Navigation - EXACTLY COPIED FROM INDEX -->
<header class="bg-white/80 backdrop-blur-sm shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Left Side: Logo & Navigation -->
        <div class="flex items-center gap-10">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="logo" class="h-14 w-auto">
            </a>
            <nav class="hidden md:flex space-x-8 space-x-reverse">
                <a href="{{ route('home') }}#about" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">درباره ما</a>
                <a href="{{ route('home') }}#features" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">ویژگی‌ها</a>
                <a href="{{ route('home') }}#packages" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">پکیج‌ها</a>
                <a href="{{ route('home') }}#blog" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">وبلاگ</a>
                <a href="{{ route('home') }}#contact" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">مشاوره رایگان</a>
            </nav>
        </div>

        <!-- Right Side: Auth Buttons & Mobile Menu -->
        <div class="flex items-center">
            <!-- Desktop Auth Buttons -->
            <div class="hidden md:flex items-center space-x-4 space-x-reverse">
                <a href="{{ route('login') }}" class="text-gray-700 font-semibold hover:text-[var(--brand-gold)] transition duration-300">ورود</a>
                <a href="{{ route('register') }}" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-5 rounded-lg hover:brightness-95 transition duration-300 shadow-md">ثبت نام</a>
            </div>
            <!-- Mobile Menu Button -->
            <button class="md:hidden text-2xl text-gray-700">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>

<main>
    <section class="py-12 sm:py-20 bg-white">
        <div class="container mx-auto px-6 max-w-7xl">
            @if($post)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    
                    <!-- Main Content Area (2/3 width) -->
                    <div class="lg:col-span-2 order-2 lg:order-1">
                        
                        <!-- Featured Image -->
                        @if($post->image)
                            <div class="mb-8">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-96 object-cover rounded-2xl shadow-xl">
                            </div>
                        @endif

                        <!-- Article Header & Metadata -->
                        <div class="pb-6 border-b border-gray-200 mb-8">
                            <h1 class="text-4xl md:text-5xl font-extrabold fantasy-font brand-blue-gradient mb-4 leading-snug">{{ $post->title }}</h1>
                            <div class="flex flex-wrap items-center text-gray-500 text-sm">
                                <span class="text-gray-600 font-medium ml-4">
                                    <i class="fas fa-user ml-2"></i>نویسنده: <b>{{ $post->author->name }}</b>
                                </span>
                                <span class="mx-4 text-gray-400">|</span>
                                <span class="text-gray-600 font-medium ml-4">
                                    <i class="fas fa-calendar-alt ml-2"></i>تاریخ: {{ jdate($post->created_at)->format('j F Y') }}
                                </span>
                                @if($post->category)
                                    <span class="mx-4 text-gray-400">|</span>
                                    <span class="bg-[var(--brand-gold)] text-white text-xs font-bold py-1 px-2.5 rounded-full shadow">{{ $post->category->name }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Article Content (Server-Side Rendered HTML) -->
                        <div class="post-content max-w-none text-justify">
                            {!! $post->processed_content !!}
                        </div>
                        
                        <!-- Share Buttons (Mockup) -->
                        <div class="mt-12 pt-6 border-t border-gray-200 flex justify-between items-center">
                            <span class="text-lg font-bold text-[var(--brand-blue)]">به اشتراک بگذارید:</span>
                            <div class="flex space-x-4 space-x-reverse">
                                <a href="#" class="text-2xl text-blue-600 hover:text-blue-700"><i class="fab fa-telegram"></i></a>
                                <a href="#" class="text-2xl text-pink-600 hover:text-pink-700"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-2xl text-gray-600 hover:text-gray-700"><i class="fas fa-link"></i></a>
                            </div>
                        </div>
                        
                        <!-- Comments Section -->
                        <div id="comments" class="mt-16 pt-10 border-t-4 border-[var(--brand-gold)]">
                            <h2 class="text-3xl font-bold text-[var(--brand-blue)] mb-8">نظرات ({{ count($post->comments) }})</h2>
                            
                            <!-- Comment Form -->
                            <form class="space-y-6 bg-gray-50 p-6 rounded-xl shadow-inner mb-10">
                                <h3 class="text-xl font-bold text-gray-700">نظر خود را بنویسید</h3>
                                <div>
                                    <label for="comment-name" class="block text-sm font-medium text-gray-700 mb-1">نام</label>
                                    <input type="text" id="comment-name" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-gold)]" required>
                                </div>
                                <div>
                                    <label for="comment-body" class="block text-sm font-medium text-gray-700 mb-1">متن نظر</label>
                                    <textarea id="comment-body" rows="4" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-gold)]" required></textarea>
                                </div>
                                <button type="submit" class="bg-[var(--brand-blue)] text-white font-bold py-3 px-8 rounded-lg hover:bg-[#0f293b] transition duration-300 shadow-md">
                                    ارسال نظر
                                </button>
                            </form>
                            
                            <!-- List of Comments (Mockup) -->
                            <div class="space-y-8">
                                @foreach($post->comments as $comment)
                                <div class="border-b pb-4">
                                    <div class="flex items-center mb-2">
                                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg ml-3">{{ Str::substr($comment->author_name, 0, 1); }}</div>
                                        <div>
                                            <p class="font-bold text-gray-800">{{ $comment->author_name }}</p>
                                            <p class="text-xs text-gray-500">تاریخ: {{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-700 pr-12">{{ $comment->body }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                    
                    <!-- Sidebar (1/3 width) -->
                    <div class="lg:col-span-1 order-1 lg:order-2 space-y-10">
                        
                        <!-- About Author -->
                        <div class="bg-gray-100 p-6 rounded-xl shadow-lg border-t-4 border-[var(--brand-gold)]">
                            <h3 class="text-xl font-bold text-[var(--brand-blue)] mb-4 border-b pb-2">درباره نویسنده</h3>
                            <div class="flex items-center mb-4">
                                <img src="https://placehold.co/80x80/12324c/f5b301?text=A" alt="نویسنده" class="w-16 h-16 rounded-full object-cover ml-4 shadow-md">
                                <div>
                                    <p class="font-bold text-lg text-gray-800">{{ $post->author->name }}</p>
                                    <p class="text-sm text-gray-500">مشاور ارشد تحصیلی</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm">
                                {{ $post->author->name }} بیش از ۱۰ سال سابقه مشاوره در زمینه کنکور را دارد و در حوزه برنامه‌ریزی و مدیریت زمان متخصص است.
                            </p>
                        </div>
                        
                        <!-- Related Posts (Mockup) -->
                        <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-blue-400">
                            <h3 class="text-xl font-bold text-[var(--brand-blue)] mb-4 border-b pb-2">مقالات مرتبط</h3>
                            <ul class="space-y-4">
                                <li class="text-gray-700 hover:text-[var(--brand-gold)] transition">
                                    <a href="#" class="block"><i class="fas fa-chevron-left text-xs ml-2"></i>۵ اشتباه رایج در آزمون‌های آزمایشی</a>
                                </li>
                                <li class="text-gray-700 hover:text-[var(--brand-gold)] transition">
                                    <a href="#" class="block"><i class="fas fa-chevron-left text-xs ml-2"></i>بهترین روش‌های خلاصه‌نویسی</a>
                                </li>
                                <li class="text-gray-700 hover:text-[var(--brand-gold)] transition">
                                    <a href="#" class="block"><i class="fas fa-chevron-left text-xs ml-2"></i>چگونه استرس کنکور را مدیریت کنیم؟</a>
                                </li>
                            </ul>
                        </div>
                        
                        <!-- Call to Action -->
                        <div class="bg-[var(--brand-gold)] p-6 rounded-xl text-white shadow-2xl text-center">
                            <h3 class="text-2xl font-bold mb-3 fantasy-font">مشاوره رایگان</h3>
                            <p class="text-sm mb-4">با یک جلسه مشاوره رایگان، برنامه مطالعاتی خود را بهینه کنید.</p>
                            <a href="{{ route('home') }}#contact" class="bg-white text-[var(--brand-blue)] font-bold py-2 px-6 rounded-lg hover:shadow-lg transition">ثبت درخواست</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-12 text-gray-500">
                    <i class="fas fa-exclamation-triangle text-4xl mb-4"></i>
                    <p class="text-lg font-semibold">مقاله مورد نظر یافت نشد!</p>
                </div>
            @endif
        </div>
    </section>
</main>

<!-- Footer - EXACTLY COPIED FROM INDEX -->
<footer class="w-full pt-16 bg-gray-100">
    <div class="max-w-[1140px] w-full mx-auto md:pb-10">
        <div class="bg-[var(--brand-blue)] text-white pt-12 pb-8 rounded-none md:rounded-2xl shadow-2xl">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <img src="{{ asset('logo.png') }}" alt="logo" class="h-24 w-auto mb-4 mx-auto bg-white p-2 rounded-lg">
                        <p class="text-gray-400">
                            مسیر موفقیت تحصیلی شما از اینجا آغاز می‌شود. با ما همراه باشید.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">دسترسی سریع</h3>
                        <ul class="space-y-2">
                            <li><a href="{{ route('home') }}#about" class="text-gray-400 hover:text-white transition">درباره ما</a></li>
                            <li><a href="{{ route('home') }}#packages" class="text-gray-400 hover:text-white transition">پکیج‌ها</a></li>
                            <li><a href="{{ route('home') }}#contact" class="text-gray-400 hover:text-white transition">تماس با ما</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">اطلاعات تماس</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><i class="fas fa-map-marker-alt ml-2 text-[var(--brand-gold)]"></i>آدرس: تهران، خیابان موفقیت</li>
                            <li><i class="fas fa-phone ml-2 text-[var(--brand-gold)]"></i>تلفن: ۰۲۱-۱۲۳۴۵۶۷۸</li>
                            <li><i class="fas fa-envelope ml-2 text-[var(--brand-gold)]"></i>ایمیل: info@ayandeh.com</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">ما را دنبال کنید</h3>
                        <div class="flex space-x-4 space-x-reverse">
                            <a href="#" class="text-gray-400 hover:text-white text-2xl transition"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white text-2xl transition"><i class="fab fa-telegram"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white text-2xl transition"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-600 text-center pt-6">
                    <p class="text-white-500">&copy; ۱۴۰۴ تمام حقوق برای آموزشگاه نگارستان علم محفوظ است.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
    