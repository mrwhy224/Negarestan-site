@extends('panel.layout')

@section('content')
                    
                    <!-- Page Header & Breadcrumb -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-[var(--brand-blue)]">مدیریت مقالات</h1>
                            <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
                                <ol class="list-none p-0 inline-flex">
                                    <li class="flex items-center">
                                        <a href="admin-panel.html" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="text-gray-800">مقالات</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="#" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-5 rounded-lg hover:brightness-95 transition duration-300 shadow-md flex items-center">
                            <i class="fas fa-plus ml-2"></i>
                            <span>افزودن مقاله</span>
                        </a>
                    </div>

                    <!-- Articles Table -->
                    <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr class="text-right font-bold text-gray-600 border-b-2 border-gray-200">
                                    <th class="px-4 py-3">عنوان مقاله</th>
                                    <th class="px-4 py-3">نویسنده</th>
                                    <th class="px-4 py-3">دسته‌بندی</th>
                                    <th class="px-4 py-3">تاریخ انتشار</th>
                                    <th class="px-4 py-3">عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <!-- Sample Row 1 -->
                                <tr>
                                    <td class="px-4 py-4">چگونه برای کنکور برنامه‌ریزی کنیم؟</td>
                                    <td class="px-4 py-4">تیم مشاوره</td>
                                    <td class="px-4 py-4"><span class="bg-blue-100 text-blue-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">مشاوره</span></td>
                                    <td class="px-4 py-4">۱ شهریور ۱۴۰۴</td>
                                    <td class="px-4 py-4">
                                        <a href="#" class="text-[var(--brand-blue)] hover:text-blue-700 ml-4"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="text-[var(--brand-blue)] hover:text-red-700"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <!-- Sample Row 2 -->
                                <tr>
                                    <td class="px-4 py-4">۵ اشتباه رایج در سال کنکور</td>
                                    <td class="px-4 py-4">علی رضایی</td>
                                    <td class="px-4 py-4"><span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">برنامه‌ریزی</span></td>
                                    <td class="px-4 py-4">۲۸ مرداد ۱۴۰۴</td>
                                    <td class="px-4 py-4">
                                        <a href="#" class="text-[var(--brand-blue)] hover:text-blue-700 ml-4"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="text-[var(--brand-blue)] hover:text-red-700"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <!-- Sample Row 3 -->
                                <tr>
                                    <td class="px-4 py-4">معرفی بهترین منابع کمک درسی</td>
                                    <td class="px-4 py-4">مریم احمدی</td>
                                    <td class="px-4 py-4"><span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded">منابع</span></td>
                                    <td class="px-4 py-4">۱۵ مرداد ۱۴۰۴</td>
                                    <td class="px-4 py-4">
                                        <a href="#" class="text-[var(--brand-blue)] hover:text-blue-700 ml-4"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="text-[var(--brand-blue)] hover:text-red-700"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

@endsection