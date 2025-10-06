<!-- Header Navigation -->
<header class="bg-white/80 backdrop-blur-sm shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Left Side: Logo & Navigation -->
        <div class="flex items-center gap-10">
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="logo" class="h-14 w-auto">
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

