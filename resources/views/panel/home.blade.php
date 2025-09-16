@extends('panel.layout')
@section('content')

                <h1 class="text-3xl font-bold text-[var(--brand-blue)]">داشبورد مدیریت</h1>
                <p class="mt-2 text-gray-600">به پنل مدیریت آموزشگاه خوش آمدید.</p>

                <!-- Placeholder content cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-gray-700">تعداد دوره‌ها</h3>
                        <p class="text-4xl font-bold text-[var(--brand-blue)] mt-2">۲۵</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-gray-700">دانش‌آموزان فعال</h3>
                        <p class="text-4xl font-bold text-[var(--brand-blue)] mt-2">۳۵۰</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-gray-700">تیکت‌های جدید</h3>
                        <p class="text-4xl font-bold text-[var(--brand-blue)] mt-2">۴</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold text-gray-700">درآمد ماهانه (تومان)</h3>
                        <p class="text-4xl font-bold text-[var(--brand-blue)] mt-2">۱۲,۰۰۰,۰۰۰</p>
                    </div>
                </div>

                <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
                    <h2 class="text-2xl font-bold text-gray-800">محتوای اصلی صفحه در اینجا قرار می‌گیرد.</h2>
                    <p class="mt-4 text-gray-600">این یک فضای نمونه برای نمایش محتوای پنل است. شما می‌توانید جداول، فرم‌ها، نمودارها و سایر اجزای مورد نیاز خود را در این قسمت قرار دهید.</p>
                </div>
@endsection