<!-- Header Navigation -->
<header class="bg-white/80 backdrop-blur-sm shadow-md sticky top-0 z-40">
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
            <button id="mobile-menu-button" class="md:hidden text-2xl text-gray-700">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Panel (Moved outside of header tag to fix positioning issue) -->
<div id="mobile-menu" class="md:hidden fixed inset-0 bg-black bg-opacity-50 z-50 hidden opacity-0 transition-opacity duration-300">
    <div id="mobile-menu-content" class="fixed top-0 right-0 h-full w-4/5 max-w-sm bg-white shadow-xl p-6 transform translate-x-full transition-transform duration-300">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold text-[var(--brand-blue)] fantasy-font">منو</h2>
            <button id="close-menu-button" class="text-2xl text-gray-500 hover:text-gray-800 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <nav class="flex flex-col space-y-6 text-lg">
            <a href="{{ route('dashboards') }}" class="text-gray-700 hover:text-[var(--brand-gold)] transition duration-300">مشاهده پنل</a>
            <a href="{{ route('quiz') }}" class="text-gray-700 hover:text-[var(--brand-gold)] transition duration-300">نمونه آزمون</a>
            <a href="#packages" class="text-gray-700 hover:text-[var(--brand-gold)] transition duration-300">پکیج‌ها</a>
            <a href="#blog" class="text-gray-700 hover:text-[var(--brand-gold)] transition duration-300">وبلاگ</a>
            <a href="#contact" class="text-gray-700 hover:text-[var(--brand-gold)] transition duration-300">مشاوره رایگان</a>
            
            <div class="border-t border-gray-200 pt-6 space-y-4">
                <a href="{{ route('login') }}" class="block text-center w-full bg-gray-100 text-gray-800 font-semibold py-3 px-5 rounded-lg hover:bg-gray-200 transition duration-300">ورود</a>
                <a href="{{ route('register') }}" class="block text-center w-full bg-[var(--brand-gold)] text-white font-bold py-3 px-5 rounded-lg hover:brightness-95 transition duration-300 shadow-md">ثبت نام</a>
            </div>
        </nav>
    </div>
</div>

