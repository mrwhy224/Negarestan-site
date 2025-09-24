@extends('panel.layout')
@push('page_js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteLinks = document.querySelectorAll('.delete-link');
            deleteLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const itemTitle = this.dataset.itemTitle;
                    const deleteUrl = this.href;
                    Swal.fire({
                        title: 'آیا مطمئن هستید؟',
                        text: `آیتم "${itemTitle}" برای همیشه حذف خواهد شد!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'بله، حذف کن!',
                        cancelButtonText: 'خیر، منصرف شدم'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = deleteUrl;
                        }
                    });
                });
            });
        });
    </script>
@endpush

@section('content')

                    <!-- Page Header & Breadcrumb -->
                    <div class="flex justify-between items-center mb-6">
                        <div>
                            <h1 class="text-3xl font-bold text-[var(--brand-blue)]">مدیریت نتایج آزمون‌ها</h1>
                            <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
                                <ol class="list-none p-0 inline-flex">
                                    <li class="flex items-center">
                                        <a href="{{ route('dashboards') }}" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="text-gray-800">نتایج آزمون‌ها</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('quiz.list') }}" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-5 rounded-lg hover:brightness-95 transition duration-300 shadow-md flex items-center">
                            <i class="fas fa-arrow-right ml-2"></i>
                            <span>بازگشت به آزمون‌ها</span>
                        </a>
                    </div>

                    <!-- Results Table -->
                    <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr class="text-right font-bold text-gray-600 border-b-2 border-gray-200">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">نام کاربر</th>
                                    <th class="px-4 py-3">عنوان آزمون</th>
                                    <th class="px-4 py-3">تاریخ شرکت</th>
                                    <th class="px-4 py-3">عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                {{-- فرض می‌کنیم یک متغیر $results از کنترلر به این ویو ارسال شده است --}}
                                @forelse($results as $result)
                                    <tr>
                                        <td class="p-4">{{ $result->id }}</td>
                                        <td class="p-4">{{ $result->user->name }}</td>
                                        <td class="p-4">{{ $result->quiz->title }}</td>
                                        <td class="p-4">
                                            <span class="font-bold text-lg {{ $result->score > 50 ? 'text-green-600' : 'text-red-600' }}">{{ $result->score }}</span>
                                            <span class="text-sm text-gray-500"> / {{ $result->quiz->questions_count * $result->quiz->point_per_question }}</span>
                                        </td>
                                        <td class="p-4">{{ jdate($result->created_at)->format('j F Y') }}</td>
                                        <td class="p-4">
                                            <a href="{{ route('quiz.result.show', ['result'=> $result->id]) }}" class="text-[var(--brand-blue)] hover:text-blue-500 ml-4"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('quiz.result.delete', ['result'=> $result->id]) }}" class="text-[var(--brand-blue)] hover:text-red-500 delete-link" data-item-title="{{ $result->user->name }} - {{ $result->quiz->title }}"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="p-6 text-center text-gray-500"> موردی یافت نشد! </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $results->links() }}
                    </div>

@endsection
