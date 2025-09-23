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
                            <h1 class="text-3xl font-bold text-[var(--brand-blue)]">مدیریت  سوالات - آزمون {{ $quiz->title }}</h1>
                            <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
                                <ol class="list-none p-0 inline-flex">
                                    <li class="flex items-center">
                                        <a href="{{ route('dashboards') }}" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="flex items-center">
                                        <a href="{{ route('quiz.list') }}" class="text-gray-500 hover:text-gray-700">آزمون ها</a>
                                    </li>
                                    <li class="mx-2 text-gray-400">/</li>
                                    <li class="text-gray-800">سوالات</li>
                                </ol>
                            </nav>
                        </div>
                        <a href="{{ route('quiz.addQuestion', $quiz->id) }}" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-5 rounded-lg hover:brightness-95 transition duration-300 shadow-md flex items-center">
                            <i class="fas fa-plus ml-2"></i>
                            <span>افزودن سوال</span>
                        </a>
                    </div>

                    <!-- Articles Table -->
                    <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
                        <table class="w-full whitespace-nowrap">
                            <thead>
                                <tr class="text-right font-bold text-gray-600 border-b-2 border-gray-200">
                                    <th class="px-4 py-3">#</th>
                                    <th class="px-4 py-3">متن سوال</th>
                                    <th class="px-4 py-3">نوع</th>
                                    <th class="px-4 py-3">گزینه</th>
                                    <th class="px-4 py-3">  تاریخ ایجاد</th>
                                    <th class="px-4 py-3">عملیات</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                    
                                @forelse($questions as $question)
                                    <tr>
                                        <td class="p-4">{{ $question->id }}</td>
                                        <td class="p-4">{{ $question->text }}</td>
                                        <td class="p-4">{{ $question->type=='single'?'یک گزینه':'   چند گزینه' }}</td>
                                        <td class="p-4">{{ $question->options_count }}</td>
                                        <td class="p-4">{{ jdate($quiz->created_at)->format('j F Y') }}</td>
                                        <td class="p-4">
                                            <a href="{{ route('quiz.option', ['quiz'=>$quiz->id,'question'=>$question->id]) }}" class="text-[var(--brand-blue)] hover:text-blue-500 ml-4"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('quiz.editQuestion', ['quiz'=>$quiz->id,'question'=>$question->id]) }}" class="text-[var(--brand-blue)] hover:text-blue-500 ml-4"><i class="fas fa-edit"></i></a>
                                            <a href="{{ route('quiz.deleteQuestion', ['quiz'=>$quiz->id,'question'=>$question->id]) }}" class="text-[var(--brand-blue)] hover:text-blue-500 delete-link" data-item-title="{{ $question->text }}"><i class="fas fa-trash"></i></a>
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
                        {{ $questions->links() }}
                    </div>

@endsection
