<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت مقالات - پنل مدیریت</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Alpine.js for interactivity -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        :root {
            --brand-gold: #f5b301;
            --brand-blue: #1c3d5a;
            --brand-blue-light: #2a4b67;
        }
        body {
            font-family: 'Vazirmatn', sans-serif;
        }
        h1, h2, h3, .fantasy-font {
            font-family: 'Lalezar', cursive;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #aaa;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div x-data="{ sidebarOpen: true }" class="flex h-screen bg-gray-200">
        <!-- Sidebar -->
        <aside 
            :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'"
            class="fixed inset-y-0 right-0 z-30 w-64 bg-[var(--brand-blue)] text-white transform transition-transform duration-300 ease-in-out md:relative md:translate-x-0">
            
            <div class="flex items-center justify-center px-6 py-4 bg-[var(--brand-blue-light)]">
                <img src="/logo.png" alt="logo" class="h-16 w-auto bg-white p-1 rounded">
            </div>

            <nav class="mt-4 px-4" x-data="{ openMenu: '{{ request()->routeIs('post.*') ? 'post' : (request()->routeIs('quiz.*') ? 'quiz' : '') }}' }">
                <a href="{{ route('dashboards') }}" class="flex items-center px-4 py-2.5 rounded-lg {{ request()->routeIs('dashboards') ? 'text-gray-200 bg-[var(--brand-blue-light)]' : 'text-gray-300 hover:bg-[var(--brand-blue-light)]' }}">
                    <i class="fas fa-tachometer-alt w-6 text-center text-lg"></i>
                    <span class="mr-3">داشبورد</span>
                </a>
                <div class="mt-4">
                    <button @click="openMenu = (openMenu === 'post' ? '' : 'post')" class="w-full flex justify-between items-center px-4 py-2.5 rounded-lg focus:outline-none text-gray-300 hover:bg-[var(--brand-blue-light)]">
                        <span class="flex items-center">
                            <i class="fas fa-book w-6 text-center text-lg"></i>
                            <span class="mr-3">نوشته ها</span>
                        </span>
                        <i class="fas" :class="openMenu === 'post' ? 'fa-chevron-down' : 'fa-chevron-left'"></i>
                    </button>
                    <div x-show="openMenu === 'post'" x-cloak class="mt-2 mr-6 space-y-2 border-r-2 border-gray-500 pr-4">
                        <a href="{{ route('post.list') }}" class="block py-2 text-gray-400 {{ request()->routeIs('post.list') ? 'text-white' : 'hover:text-white' }}">همه نوشته ها</a>
                        <a href="{{ route('post.category') }}" class="block py-2 text-gray-400 {{ request()->routeIs('post.category') ? 'text-white' : 'hover:text-white' }}">دسته بندی</a>
                        <a href="{{ route('post.create') }}" class="block py-2 text-gray-400 {{ request()->routeIs('post.create') ? 'text-white' : 'hover:text-white' }}">افزودن</a>
                    </div>
                </div>
                <div class="mt-4">
                    <button @click="openMenu = (openMenu === 'quiz' ? '' : 'quiz')" class="w-full flex justify-between items-center px-4 py-2.5 rounded-lg focus:outline-none text-gray-300 hover:bg-[var(--brand-blue-light)]">
                        <span class="flex items-center">
                            <i class="fas fa-book w-6 text-center text-lg"></i>
                            <span class="mr-3">ازمون ها</span>
                        </span>
                        <i class="fas" :class="openMenu === 'quiz' ? 'fa-chevron-down' : 'fa-chevron-left'"></i>
                    </button>
                    <div x-show="openMenu === 'quiz'" x-cloak class="mt-2 mr-6 space-y-2 border-r-2 border-gray-500 pr-4">
                        <a href="{{ route('quiz.list') }}" class="block py-2 text-gray-400 {{ request()->routeIs('quiz.list') ? 'text-white' : 'hover:text-white' }}">لیست</a>
                        <a href="{{ route('quiz.result') }}" class="block py-2 text-gray-400 {{ request()->routeIs('quiz.result') ? 'text-white' : 'hover:text-white' }}">نتایج</a>
                    </div>
                </div>

                <a href="{{ route('admin') }}" class="flex items-center mt-4 px-4 py-2.5 rounded-lg {{ request()->routeIs('admin') ? 'text-gray-200 bg-[var(--brand-blue-light)]' : 'text-gray-300 hover:bg-[var(--brand-blue-light)]' }}">
                    <i class="fas fa-file-alt w-6 text-center text-lg"></i>
                    <span class="mr-3">مدیران</span>
                </a>
                <a href="{{ route('post.category') }}" class="flex items-center mt-4 px-4 py-2.5 rounded-lg {{ request()->routeIs('post.category') ? 'text-gray-200 bg-[var(--brand-blue-light)]' : 'text-gray-300 hover:bg-[var(--brand-blue-light)]' }}">
                    <i class="fas fa-file-alt w-6 text-center text-lg"></i>
                    <span class="mr-3">کاربران</span>
                </a>
                
            </nav>
        </aside>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="flex justify-between items-center py-4 px-6 bg-white border-b-2 border-gray-200">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none md:hidden">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>
                </div>
                <div class="flex items-center" x-data="{ dropdownOpen: false }">
                    <button @click="dropdownOpen = !dropdownOpen" class="relative block">
                        <div class="flex items-center">
                            <span class="ml-3 text-gray-700 font-semibold">حساب کاربری</span>
                             <img class="h-10 w-10 rounded-full object-cover" src="https://placehold.co/100x100/f5b301/1c3d5a?text=A" alt="Your avatar">
                        </div>
                    </button>
                    <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-cloak class="absolute top-16 left-6 w-48 bg-white rounded-md shadow-lg py-1 z-20">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">پروفایل</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">خروج</a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <div class="container mx-auto">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
</body>
@stack('page_js')
</html>
