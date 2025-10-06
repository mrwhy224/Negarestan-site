<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'وب‌سایت آموزشگاه')</title>
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
            min-height: 40vh;
            max-height: 60vh;
        }
        @media (min-width: 768px) {
            .swiper-container {
                min-height: 50vh;
                max-height: 75vh;
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- فراخوانی هدر -->
    @include('header')

    <!-- بخش اصلی که محتوای هر صفحه در آن قرار می‌گیرد -->
    <main>
        @yield('content')
    </main>

    <!-- فراخوانی فوتر -->
    @include('footer')

</body>
</html>

