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
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Header Navigation -->
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
    <section class="py-16 sm:py-24">
        <div class="container mx-auto px-6 max-w-4xl text-right">
            @if($post)
                <h1 class="text-4xl md:text-5xl font-extrabold fantasy-font brand-blue-gradient mb-6 leading-tight">{{ $post->title }}</h1>
                <div class="flex flex-wrap items-center text-gray-500 text-sm mb-12 border-b pb-4">
                    <span>نویسنده: <b>{{ $post->author->name }}</b></span>
                    <span class="mx-2 text-gray-400">|</span>
                    <span>تاریخ انتشار: {{ jdate($post->created_at)->format('j F Y') }}</span>
                    @if($post->category)
                        <span class="mx-2 text-gray-400">|</span>
                        <span class="bg-[var(--brand-gold)] text-white text-xs font-bold py-1 px-2.5 rounded-full shadow">{{ $post->category->name }}</span>
                    @endif
                </div>

                {{-- فرض می‌شود محتوای Editor.js از قبل در کنترلر به HTML تبدیل شده و به متغیر $post->processed_content پاس داده شده است --}}
                <div class="prose prose-lg max-w-none text-justify leading-loose">
                    {!! $post->processed_content !!}
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

<!-- Footer -->
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
