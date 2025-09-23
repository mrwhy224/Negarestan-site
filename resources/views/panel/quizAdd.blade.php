@extends('panel.layout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-[var(--brand-blue)]">{{ isset($quiz) ? 'ویرایش آزمون' : 'افزودن آزمون جدید' }}</h1>
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
                <li class="text-gray-800">{{ isset($quiz) ? 'ویرایش' : 'افزودن' }}</li>
            </ol>
        </nav>
    </div>
</div>

    {{-- Form Card --}}
    <div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
        {{-- به‌روزرسانی مسیر فرم برای ذخیره یا به‌روزرسانی --}}
        <form action="{{ isset($quiz) ? route('quiz.update', $quiz) : route('quiz.store') }}" method="POST">
            @csrf
            {{-- اگر در حالت ویرایش باشیم، متد PUT را اضافه می‌کنیم --}}
            @if(isset($quiz))
                @method('PUT')
            @endif

            <div class="space-y-6">
                {{-- فیلد عنوان آزمون --}}
                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">عنوان آزمون</label>
                    <input type="text"
                               id="title"
                               name="title"
                               value="{{ old('title', $quiz->title ?? '') }}"
                               class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('title') border-red-500 @enderror"
                               placeholder="مثلا: آزمون جامع مرحله اول"
                               required>

                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                
                {{-- فیلد توضیحات جدید --}}
                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">توضیحات</label>
                    <textarea id="description"
                              name="description"
                              rows="4"
                              class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('description') border-red-500 @enderror"
                              placeholder="توضیحات مربوط به آزمون را اینجا وارد کنید.">{{ old('description', $quiz->description ?? '') }}</textarea>

                    @error('description')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex justify-end items-center mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('quiz.list') }}" class="text-gray-600 font-bold py-2 px-5 rounded-lg hover:bg-gray-100 transition-colors">
                    انصراف
                </a>
                <button type="submit" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-6 rounded-lg hover:bg-yellow-500 transition-colors shadow-md">
                    {{ isset($quiz) ? 'به‌روزرسانی' : 'ذخیره' }}
                </button>
            </div>
        </form>
    </div>
@endsection
