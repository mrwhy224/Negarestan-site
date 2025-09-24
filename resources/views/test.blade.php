{{-- This file should extend your main admin layout --}}
{{-- For demonstration, I'm including the full HTML structure --}}
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت آزمون‌ها - پنل مدیریت</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root { --brand-gold: #f5b301; --brand-blue: #1c3d5a; }
        body { font-family: 'Vazirmatn', sans-serif; }
        .fantasy-font { font-family: 'Lalezar', cursive; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100" x-data="{ sidebarOpen: true }">
        <!-- Sidebar -->
        <aside class="flex-shrink-0 w-64 flex flex-col border-l border-gray-200 bg-white transition-all duration-300" :class="{'-mr-64': !sidebarOpen}">
            <div class="h-20 flex items-center justify-center border-b bg-[var(--brand-blue)]">
                 <img src="logo.jpg" alt="Logo" class="w-24 bg-gray-200 p-2 rounded-lg">
            </div>
            <nav class="flex-1 overflow-y-auto" x-data="{ openMenu: '' }">
                 <a href="#" class="flex items-center p-4 text-gray-700 hover:bg-yellow-50">
                    <i class="fas fa-home ml-3 text-lg text-gray-500"></i>
                    <span>داشبورد</span>
                </a>
                <div x-data="{ open: true }">
                    <button @click="open = !open" class="w-full flex justify-between items-center p-4 text-gray-700 hover:bg-yellow-50">
                        <span class="flex items-center">
                            <i class="fas fa-book ml-3 text-lg text-gray-500"></i>
                            <span>آزمون‌ها</span>
                        </span>
                        <i class="fas" :class="open ? 'fa-chevron-down' : 'fa-chevron-up'"></i>
                    </button>
                    <div x-show="open" x-cloak class="bg-gray-50">
                        <a href="#" class="block py-2 pr-12 text-sm text-gray-600 hover:bg-yellow-100 bg-yellow-100 border-r-4 border-yellow-400">لیست آزمون‌ها</a>
                        <a href="#" class="block py-2 pr-12 text-sm text-gray-600 hover:bg-yellow-100">افزودن آزمون</a>
                    </div>
                </div>
                 <a href="#" class="flex items-center p-4 text-gray-700 hover:bg-yellow-50">
                    <i class="fas fa-users ml-3 text-lg text-gray-500"></i>
                    <span>کاربران</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="flex justify-between items-center p-6 bg-white border-b">
                <div class="flex items-center">
                    <button @click="sidebarOpen = !sidebarOpen" class="text-gray-500 focus:outline-none lg:hidden">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-2xl font-semibold text-gray-700 ml-4 hidden md:block">مدیریت آزمون‌ها</h1>
                </div>
                <div class="flex items-center">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen" class="flex items-center">
                            <span class="ml-2">نام کاربر ادمین</span>
                            <img class="h-8 w-8 rounded-full object-cover" src="https://placehold.co/100x100" alt="Avatar">
                        </button>
                        <div x-show="dropdownOpen" @click.away="dropdownOpen = false" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-50">پروفایل</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-yellow-50">خروج</a>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                <!-- Breadcrumb -->
                <div class="flex justify-between items-center mb-6">
                    <nav class="text-sm">
                        <ol class="list-none p-0 inline-flex">
                            <li class="flex items-center">
                                <a href="#" class="text-gray-500">پنل مدیریت</a>
                                <i class="fas fa-chevron-left mx-2 text-xs"></i>
                            </li>
                            <li class="flex items-center">
                                <span class="text-gray-800 font-semibold">آزمون‌ها</span>
                            </li>
                        </ol>
                    </nav>
                    <a href="#" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-4 rounded-lg hover:brightness-110 transition duration-300">
                        <i class="fas fa-plus ml-2"></i>
                        افزودن آزمون جدید
                    </a>
                </div>

                <!-- Articles Table -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <table class="min-w-full">
                        <thead class="bg-gray-50 border-b">
                            <tr>
                                <th class="p-4 text-right text-sm font-bold text-gray-600">#</th>
                                <th class="p-4 text-right text-sm font-bold text-gray-600">عنوان آزمون</th>
                                <th class="p-4 text-center text-sm font-bold text-gray-600">تعداد سوالات</th>
                                <th class="p-4 text-right text-sm font-bold text-gray-600">تاریخ ایجاد</th>
                                <th class="p-4 text-center text-sm font-bold text-gray-600">عملیات</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Sample Row 1 -->
                            <tr class="border-b hover:bg-yellow-50">
                                <td class="p-4 text-gray-700">1</td>
                                <td class="p-4 text-gray-800 font-semibold">آزمون تعیین سطح ادبیات</td>
                                <td class="p-4 text-gray-700 text-center">4</td>
                                <td class="p-4 text-gray-700">۱۴۰۳/۰۶/۲۵</td>
                                <td class="p-4 text-center space-x-2 space-x-reverse">
                                    <a href="#" class="text-blue-500 hover:text-blue-700" title="مشاهده سوالات"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="text-green-500 hover:text-green-700" title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="text-red-500 hover:text-red-700 delete-quiz-btn" data-quiz-title="آزمون تعیین سطح ادبیات" title="حذف"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <!-- Sample Row 2 -->
                             <tr class="border-b hover:bg-yellow-50">
                                <td class="p-4 text-gray-700">2</td>
                                <td class="p-4 text-gray-800 font-semibold">نظرسنجی کیفیت دوره‌ها</td>
                                <td class="p-4 text-gray-700 text-center">8</td>
                                <td class="p-4 text-gray-700">۱۴۰۳/۰۶/۲۰</td>
                                <td class="p-4 text-center space-x-2 space-x-reverse">
                                    <a href="#" class="text-blue-500 hover:text-blue-700" title="مشاهده سوالات"><i class="fas fa-eye"></i></a>
                                    <a href="#" class="text-green-500 hover:text-green-700" title="ویرایش"><i class="fas fa-pencil-alt"></i></a>
                                    <a href="#" class="text-red-500 hover:text-red-700 delete-quiz-btn" data-quiz-title="نظرسنجی کیفیت دوره‌ها" title="حذف"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    
    <script src="/js/quizzes.js"></script>
</body>
</html>
