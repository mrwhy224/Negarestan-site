<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>وب‌سایت آموزشگاه </title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
        /* استایل سفارشی برای گرادینت پس‌زمینه */
        .gradient-bg {
            background-color: #f8fafc;
            background-image: radial-gradient(circle at 1px 1px, #e2e8f0 1px, transparent 0);
            background-size: 20px 20px;
        }
        /* استایل سفارشی برای دکمه‌های Swiper */
        .swiper-button-next, .swiper-button-prev {
            color: white !important;
            background-color: rgba(0, 0, 0, 0.3);
            width: 44px !important;
            height: 44px !important;
            border-radius: 50%;
            transition: background-color 0.3s ease;
        }
        .swiper-button-next:hover, .swiper-button-prev:hover {
            background-color: rgba(0, 0, 0, 0.5);
        }
        .swiper-button-next::after, .swiper-button-prev::after {
            font-size: 1.25rem !important;
            font-weight: bold;
        }
        /* استایل برای صفحه‌بندی Swiper */
        .swiper-pagination-bullet {
            background-color: white !important;
            opacity: 0.7;
        }
        .swiper-pagination-bullet-active {
            background-color: var(--brand-gold) !important;
            opacity: 1;
        }
        #typing-effect::after {
            content: '|';
            animation: blink 0.7s infinite;
        }
        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
        .swiper-container {
            min-height: 40vh; /* حداقل ۴۰٪ ارتفاع صفحه در موبایل */
            max-height: 60vh; /* حداکثر ۶۰٪ ارتفاع صفحه در موبایل */
        }
        @media (min-width: 768px) { /* md breakpoint */
            .swiper-container {
                min-height: 50vh; /* حداقل ۵۰٪ ارتفاع صفحه در دسکتاپ */
                max-height: 75vh; /* حداکثر ۷۵٪ ارتفاع صفحه در دسکتاپ */
            }
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
                <img src="logo.png" alt="logo" class="h-14 w-auto">
            </a>
            <nav class="hidden md:flex space-x-8 space-x-reverse">
                <a href="{{ route('dashboards') }}" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">مشاهده پنل</a>
                <a href="{{ route('quiz') }}" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">نمونه آزمون</a>
                <a href="#packages" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">پکیج‌ها</a>
                <a href="#blog" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">وبلاگ</a>
                <a href="#contact" class="text-gray-600 hover:text-[var(--brand-gold)] transition duration-300">مشاوره رایگان</a>
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
    <!-- بخش اسلایدر با Swiper.js -->
    <!-- ارتفاع ثابت (h-96 md:h-[500px]) حذف شد و ارتفاع توسط CSS سفارشی (vh) مدیریت می‌شود. -->
    <section id="slider" class="relative w-full swiper-container">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <img src="/images/slide1.png" alt="تصویر دانش‌آموزان موفق" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-8 md:p-16">
                    <div class="text-right text-white max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold fantasy-font">آینده‌ای درخشان بسازید</h2>
                        <p class="mt-4 text-lg md:text-xl">با برنامه‌ریزی دقیق و اساتید مجرب، مسیر موفقیت را هموار می‌کنیم.</p>
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
                <img src="/images/slide2.png" alt="تصویر کلاس درس" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-8 md:p-16">
                    <div class="text-right text-white max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold fantasy-font">آموزش با جدیدترین متدها</h2>
                        <p class="mt-4 text-lg md:text-xl">محیطی پویا و مدرن برای یادگیری بهتر و عمیق‌تر.</p>
                    </div>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
                <img src="/images/slide3.png" alt="تصویر جلسه مشاوره" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-8 md:p-16">
                    <div class="text-right text-white max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold fantasy-font">راهنمای شما تا روز کنکور</h2>
                        <p class="mt-4 text-lg md:text-xl">مشاوران ما در تمام مراحل همراه شما خواهند بود.</p>
                    </div>
                </div>
            </div>
            <!-- Slide 4 -->
            <div class="swiper-slide">
                <img src="/images/slide4.png" alt="تصویر جلسه مشاوره" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-8 md:p-16">
                    <div class="text-right text-white max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold fantasy-font">راهنمای شما تا روز کنکور</h2>
                        <p class="mt-4 text-lg md:text-xl">مشاوران ما در تمام مراحل همراه شما خواهند بود.</p>
                    </div>
                </div>
            </div>
            <!-- Slide 5 -->
            <div class="swiper-slide">
                <img src="/images/slide5.png" alt="تصویر جلسه مشاوره" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-8 md:p-16">
                    <div class="text-right text-white max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold fantasy-font">راهنمای شما تا روز کنکور</h2>
                        <p class="mt-4 text-lg md:text-xl">مشاوران ما در تمام مراحل همراه شما خواهند بود.</p>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <img src="/images/slide6.png" alt="تصویر جلسه مشاوره" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-8 md:p-16">
                    <div class="text-right text-white max-w-2xl">
                        <h2 class="text-4xl md:text-6xl font-bold fantasy-font">راهنمای شما تا روز کنکور</h2>
                        <p class="mt-4 text-lg md:text-xl">مشاوران ما در تمام مراحل همراه شما خواهند بود.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>

    <!-- بخش توضیحات و عنوان موسسه -->
    <section id="about" class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-8 leading-tight">
                <span>آموزشگاه علمی </span>
                <span class="bg-[var(--brand-gold)] text-white px-4 py-1 rounded-lg shadow-lg inline-block min-w-[150px] text-center">
                    <span id="typing-effect"></span>
                </span>
                <span>، برترین در سطح کشور</span>
            </h2>
            <p class="max-w-3xl mx-auto text-lg text-gray-600 leading-relaxed text-justify">
                ما در آموزشگاه آینده، با بیش از یک دهه تجربه درخشان در زمینه آموزش و مشاوره تحصیلی، به رسالت خود یعنی پرورش استعدادها و هدایت دانش‌آموزان به سوی بهترین دانشگاه‌ها و رشته‌های تحصیلی، متعهد هستیم. با بهره‌گیری از اساتید برجسته، منابع آموزشی به‌روز و یک برنامه‌ریزی منسجم، تلاش می‌کنیم تا هر دانش‌آموز بهترین نسخه از خود را شکوفا کند.
            </p>
        </div>
    </section>

    <!-- بخش شمارنده‌ها -->
    <section id="stats" class="py-16 sm:py-24 gradient-bg">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-20 text-center">
                <div class="bg-white/50 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200">
                    <i class="fas fa-calendar-alt text-5xl text-[var(--brand-gold)] mb-4"></i>
                    <p class="text-5xl font-bold text-gray-800 counter" data-target="15">۰</p>
                    <h3 class="text-2xl mt-2 text-gray-600">سال سابقه درخشان</h3>
                </div>
                <div class="bg-white/50 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200">
                    <i class="fas fa-user-graduate text-5xl text-[var(--brand-gold)] mb-4"></i>
                    <p class="text-5xl font-bold text-gray-800 counter" data-target="5000">۰</p>
                    <h3 class="text-2xl mt-2 text-gray-600">دانش‌آموز موفق</h3>
                </div>
                <div class="bg-white/50 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200">
                    <i class="fas fa-trophy text-5xl text-[var(--brand-gold)] mb-4"></i>
                    <p class="text-5xl font-bold text-gray-800 counter" data-target="300">۰</p>
                    <h3 class="text-2xl mt-2 text-gray-600">رتبه برتر کنکور</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش پکیج‌های آموزشی -->
    <section id="packages" class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-4">پکیج‌های ویژه آموزشی</h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    برای هر هدفی، یک مسیر ویژه طراحی کرده‌ایم.
                </p>
            </div>

            <div class="space-y-20">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="text-center md:text-right">
                        <h3 class="text-3xl font-bold text-[var(--brand-blue)] mb-4">پکیج جامع کنکور تجربی</h3>
                        <p class="text-gray-600 leading-loose text-lg">
                            شامل کلاس‌های درسی، آزمون‌های آزمایشی، و مشاوره‌های تخصصی برای قبولی در رشته‌های پرطرفدار پزشکی و پیراپزشکی. با این پکیج، تمام منابع لازم برای موفقیت را در اختیار خواهید داشت.
                        </p>
                        <a href="#" class="mt-6 inline-block bg-[var(--brand-gold)] text-white font-bold py-3 px-8 rounded-lg hover:brightness-95 transition duration-300 text-lg shadow-md">
                            مشاهده جزئیات
                        </a>
                    </div>
                    <div>
                        <img src="https://placehold.co/600x400/f5b301/ffffff?text=Image+1" alt="پکیج کنکور تجربی" class="w-full h-auto object-cover rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-500">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                    <div class="md:order-2 text-center md:text-left">
                        <h3 class="text-3xl font-bold text-[var(--brand-blue)] mb-4">دوره طلایی کنکور ریاضی</h3>
                        <p class="text-gray-600 leading-loose text-lg">
                            تمرکز بر دروس محاسباتی و تحلیلی با اساتید برتر کشور برای موفقیت در رشته‌های مهندسی. این دوره به صورت ویژه برای تقویت مهارت‌های حل مسئله طراحی شده است.
                        </p>
                        <a href="#" class="mt-6 inline-block bg-[var(--brand-gold)] text-white font-bold py-3 px-8 rounded-lg hover:brightness-95 transition duration-300 text-lg shadow-md">
                            مشاهده جزئیات
                        </a>
                    </div>
                    <div class="md:order-1">
                        <img src="https://placehold.co/600x400/f5b301/ffffff?text=Image+2" alt="پکیج کنکور ریاضی" class="w-full h-auto object-cover rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-500">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش ویژگی‌ها -->
    <section id="features" class="py-16 sm:py-24 gradient-bg">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-4">چرا آموزشگاه آینده؟</h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    ویژگی‌هایی که ما را به بهترین انتخاب برای شما تبدیل می‌کند.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gray-50/50 border border-gray-200 p-8 rounded-2xl text-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-yellow-100 rounded-full">
                        <i class="fas fa-chalkboard-teacher text-4xl text-[var(--brand-gold)]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">اساتید برجسته</h3>
                    <p class="text-gray-600">
                        بهره‌گیری از بهترین و مجرب‌ترین دبیران و مشاوران کنکور کشور.
                    </p>
                </div>
                <div class="bg-gray-50/50 border border-gray-200 p-8 rounded-2xl text-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-yellow-100 rounded-full">
                        <i class="fas fa-tasks text-4xl text-[var(--brand-gold)]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">برنامه‌ریزی شخصی</h3>
                    <p class="text-gray-600">
                        ارائه برنامه مطالعاتی منحصر به فرد برای هر دانش‌آموز متناسب با نیازهای او.
                    </p>
                </div>
                <div class="bg-gray-50/50 border border-gray-200 p-8 rounded-2xl text-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-yellow-100 rounded-full">
                        <i class="fas fa-flask text-4xl text-[var(--brand-gold)]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">آزمون‌های شبیه‌ساز</h3>
                    <p class="text-gray-600">
                        برگزاری آزمون‌های منظم و استاندارد برای تحلیل نقاط قوت و ضعف.
                    </p>
                </div>
                <div class="bg-gray-50/50 border border-gray-200 p-8 rounded-2xl text-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-yellow-100 rounded-full">
                        <i class="fas fa-headset text-4xl text-[var(--brand-gold)]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">پشتیبانی مستمر</h3>
                    <p class="text-gray-600">
                        همراهی و پشتیبانی مشاوران تحصیلی در تمام طول مسیر تا روز کنکور.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش وبلاگ -->
    <section id="blog" class="py-16 sm:py-24 bg-white">
        <div class="container max-w-screen-xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-4">آخرین مقالات و وبلاگ</h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    نکات مشاوره‌ای، اخبار تحصیلی و راهنمای انتخاب رشته را اینجا بخوانید.
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-6 gap-8 items-start">
                @foreach($posts as $index => $post)
                    @if($index==0)
                        <a href="{{ route('single',['post'=>$post->slug]) }}" class="lg:col-span-4 lg:order-1 bg-white rounded-2xl shadow-xl overflow-hidden h-full flex flex-col group transform hover:-translate-y-1 transition-all duration-300">
                            <div class="relative">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-96 object-cover">
                                <div class="absolute top-4 right-4 bg-[var(--brand-gold)] text-white text-sm font-bold py-1 px-3 rounded-full shadow">{{ $post->category->name }}</div>
                            </div>
                            <div class="p-6 flex-grow flex flex-col">
                                <h3 class="text-2xl font-bold text-gray-800 mb-3 group-hover:text-[var(--brand-gold)] transition">{{ $post->title }}</h3>
                                <p class="text-gray-600 mb-4 flex-grow">{{ $post->excerpt }}</p>
                                <div class="pt-4 flex justify-between items-center text-sm text-gray-500 border-t border-gray-200 mt-auto">
                                    <span><i class="fas fa-user ml-2"></i>{{ $post->author->name }}</span>
                                    <span><i class="fas fa-calendar-alt ml-2"></i>{{ jdate($post->created_at)->format('j F Y') }}</span>
                                </div>
                            </div>
                        </a>
                    @elseif($index==1)
                    <div class="lg:col-span-2 lg:order-2 space-y-8">
                        <a href="{{ route('single',['post'=>$post->slug]) }}" class="bg-white rounded-2xl shadow-lg overflow-hidden block group transform hover:-translate-y-1 transition-all duration-300">
                            <div class="relative">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3 bg-[var(--brand-gold)] text-white text-xs font-bold py-1 px-2.5 rounded-full shadow">{{ $post->category->name }}</div>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-lg text-gray-800 mb-3 group-hover:text-[var(--brand-gold)] transition">{{ $post->title }}</h4>
                                <p class="text-gray-600 mb-4 flex-grow">{{ $post->excerpt }}</p>
                                <div class="pt-4 flex justify-between items-center text-sm text-gray-500 border-t border-gray-200 mt-auto">
                                    <span><i class="fas fa-user ml-2"></i>{{ $post->author->name }}</span>
                                    <span><i class="fas fa-calendar-alt ml-2"></i>{{ jdate($post->created_at)->format('j F Y') }}</span>
                                </div>
                            </div>
                        </a>
                        @if(count($posts) == 2)</div>@endif
                    @elseif($index==2)
                        <a href="{{ route('single',['post'=>$post->slug]) }}" class="bg-white rounded-2xl shadow-lg overflow-hidden block group transform hover:-translate-y-1 transition-all duration-300">
                            <div class="relative">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                                <div class="absolute top-3 right-3 bg-[var(--brand-gold)] text-white text-xs font-bold py-1 px-2.5 rounded-full shadow">{{ $post->category->name }}</div>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-lg text-gray-800 mb-3 group-hover:text-[var(--brand-gold)] transition">{{ $post->title }}</h4>
                                <p class="text-gray-600 mb-4 flex-grow">{{ $post->excerpt }}</p>
                                <div class="pt-4 flex justify-between items-center text-sm text-gray-500 border-t border-gray-200 mt-auto">
                                    <span><i class="fas fa-user ml-2"></i>{{ $post->author->name }}</span>
                                    <span><i class="fas fa-calendar-alt ml-2"></i>{{ jdate($post->created_at)->format('j F Y') }}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    @elseif($index==3 || $index==4)
                        <a href="{{ route('single',['post'=>$post->slug]) }}" class="lg:col-span-3 lg:order-3 bg-white rounded-2xl shadow-lg overflow-hidden block group transform hover:-translate-y-1 transition-all duration-300">
                            <div class="relative">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-64 object-cover">
                                <div class="absolute top-3 right-3 bg-[var(--brand-gold)] text-white text-xs font-bold py-1 px-2.5 rounded-full shadow">{{ $post->category->name }}</div>
                            </div>
                            <div class="p-4">
                                <h4 class="font-bold text-lg text-gray-800 mb-3 group-hover:text-[var(--brand-gold)] transition">{{ $post->title }}</h4>
                                <p class="text-gray-600 mb-4 flex-grow">{{ $post->excerpt }}</p>
                                <div class="pt-4 flex justify-between items-center text-sm text-gray-500 border-t border-gray-200 mt-auto">
                                    <span><i class="fas fa-user ml-2"></i>{{ $post->author->name }}</span>
                                    <span><i class="fas fa-calendar-alt ml-2"></i>{{ jdate($post->created_at)->format('j F Y') }}</span>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach

            </div>
            <div class="text-center mt-12">
                <a href="{{ route('post.list') }}" class="inline-block font-bold py-3 px-8 rounded-lg hover:translate-y-1 transition duration-300 text-lg">
                    مشاهده بیشتر
                </a>
            </div>
        </div>
    </section>

    <!-- بخش فرم درخواست مشاوره -->
    <section id="contact" class="py-16 sm:py-24 gradient-bg">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 lg:flex lg:items-center lg:gap-12 max-w-5xl mx-auto">
                <div class="lg:w-1/2 text-center lg:text-right mb-8 lg:mb-0">
                    <h2 class="text-4xl md:text-4xl font-bold text-[var(--brand-blue)] mb-4">مشاوره رایگان می‌خواهید؟</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        فرم زیر را پر کنید تا کارشناسان ما در اسرع وقت با شما تماس بگیرند و یک جلسه مشاوره تخصصی رایگان برایتان ترتیب دهند.
                    </p>
                </div>
                <div class="lg:w-1/2">
                    <form id="consultationForm" class="space-y-4">
                        <div>
                            <label for="name" class="block text-gray-700 font-bold mb-2">نام و نام خانوادگی</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-gray-100 border-2 border-transparent rounded-lg focus:outline-none focus:border-[var(--brand-gold)] transition" required>
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 font-bold mb-2">شماره تماس</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 bg-gray-100 border-2 border-transparent rounded-lg focus:outline-none focus:border-[var(--brand-gold)] transition" required>
                        </div>
                        <div>
                            <label for="grade" class="block text-gray-700 font-bold mb-2">مقطع تحصیلی</label>
                            <select id="grade" name="grade" class="w-full px-4 py-3 bg-gray-100 border-2 border-transparent rounded-lg focus:outline-none focus:border-cyan-500 transition">
                                <option>دهم</option>
                                <option>یازدهم</option>
                                <option>دوازدهم</option>
                                <option>فارغ‌التحصیل</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-[var(--brand-gold)] text-white font-bold py-3 px-6 rounded-lg hover:brightness-95 transition duration-300 text-lg shadow-md">
                            ارسال درخواست
                        </button>
                    </form>
                    <div id="form-message" class="mt-4 text-center"></div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- فوتر -->
<footer class="w-full pt-16 bg-gray-100">
    <div class="max-w-[1140px] w-full mx-auto md:pb-10">
        <div class="bg-[var(--brand-blue)] text-white pt-12 pb-8 rounded-none md:rounded-2xl shadow-2xl">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <img src="logo.png" alt="logo" class="h-24 w-auto mb-4 mx-auto bg-white p-2 rounded-lg">
                        <p class="text-gray-400">
                            مسیر موفقیت تحصیلی شما از اینجا آغاز می‌شود. با ما همراه باشید.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">دسترسی سریع</h3>
                        <ul class="space-y-2">
                            <li><a href="#about" class="text-gray-400 hover:text-white transition">درباره ما</a></li>
                            <li><a href="#packages" class="text-gray-400 hover:text-white transition">پکیج‌ها</a></li>
                            <li><a href="#contact" class="text-gray-400 hover:text-white transition">تماس با ما</a></li>
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

<!-- Swiper.js JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- مقداردهی اولیه Swiper.js ---
        const swiper = new Swiper('.swiper-container', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        // --- اسکریپت شمارنده‌ها ---
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        const animateCounters = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute('data-target');
                    let count = 0;

                    const updateCount = () => {
                        const inc = Math.ceil(target / speed);
                        count = Math.min(count + inc, target);
                        counter.innerText = count.toLocaleString('fa');

                        if (count < target) {
                            setTimeout(updateCount, 15);
                        }
                    };

                    updateCount();
                    observer.unobserve(counter);
                }
            });
        };

        const observer = new IntersectionObserver(animateCounters, {
            root: null,
            threshold: 0.5
        });

        counters.forEach(counter => {
            observer.observe(counter);
        });

        // --- اسکریپت فرم مشاوره ---
        const form = document.getElementById('consultationForm');
        const formMessage = document.getElementById('form-message');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            formMessage.textContent = 'در حال ارسال درخواست...';
            formMessage.className = 'text-blue-600';

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('/api/user-forms', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify(data)
                });

                if (!response.ok) {
                    throw new Error('Server responded with an error');
                }

                formMessage.textContent = 'درخواست شما با موفقیت ثبت شد! به زودی با شما تماس می‌گیریم.';
                formMessage.className = 'text-green-600 font-bold';
                form.reset();
            } catch (error) {
                console.error('Error submitting form:', error);
                formMessage.textContent = 'خطا در ارسال درخواست. لطفا دوباره تلاش کنید.';
                formMessage.className = 'text-red-600 font-bold';
            }
        });

        // --- انیمیشن تایپ ---
        const typingElement = document.getElementById('typing-effect');
        if (typingElement) {
            const words = ["آینده", "موفقیت", "رویاهایتان"];
            let wordIndex = 0;
            let charIndex = 0;
            let isDeleting = false;

            function type() {
                const currentWord = words[wordIndex];

                if (isDeleting) {
                    typingElement.textContent = currentWord.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typingElement.textContent = currentWord.substring(0, charIndex + 1);
                    charIndex++;
                }

                if (!isDeleting && charIndex === currentWord.length) {
                    isDeleting = true;
                    setTimeout(type, 2000);
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % words.length;
                    setTimeout(type, 500);
                } else {
                    const typingSpeed = isDeleting ? 100 : 150;
                    setTimeout(type, typingSpeed);
                }
            }
            type();
        }
    });
</script>
</body>
</html>
