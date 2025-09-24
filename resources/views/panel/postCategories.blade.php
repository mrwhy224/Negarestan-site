@extends('panel.layout')

@section('content')
<div class="flex justify-between items-center mb-6">
    <div>
        <h1 class="text-3xl font-bold text-[var(--brand-blue)]">{{ isset($category) ? 'ویرایش دسته‌بندی' : 'افزودن دسته‌بندی جدید' }}</h1>
        <nav class="text-sm font-semibold mt-2" aria-label="Breadcrumb">
            <ol class="list-none p-0 inline-flex">
                <li class="flex items-center">
                    <a href="{{ route('dashboards') }}" class="text-gray-500 hover:text-gray-700">داشبورد</a>
                </li>
                <li class="mx-2 text-gray-400">/</li>
                <li class="flex items-center">
                    <a href="{{ route('post.list') }}" class="text-gray-500 hover:text-gray-700">نوشته ها</a>
                </li>
                <li class="mx-2 text-gray-400">/</li>
                <li class="text-gray-800">{{ isset($category) ? 'ویرایش' : 'دسته بندی' }}</li>
            </ol>
        </nav>
    </div>
</div>

{{-- فرم افزودن/ویرایش دسته‌بندی --}}
<div class="bg-white rounded-lg shadow-md p-6 lg:p-8 mb-6">
    <h2 class="text-xl font-bold text-gray-800 mb-4">{{ isset($category) ? 'ویرایش دسته‌بندی' : 'افزودن دسته‌بندی جدید' }}</h2>
    <form action="{{ isset($category) ? route('post.updateCategory', $category) : route('post.storeCategory') }}" method="POST">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        
        <div class="space-y-4">
            {{-- فیلد نام دسته‌بندی --}}
            <div>
                <label for="name" class="block text-sm font-bold text-gray-700 mb-2">نام دسته‌بندی</label>
                <input type="text"
                       id="name"
                       name="name"
                       value="{{ old('name', $category->name ?? '') }}"
                       class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('name') border-red-500 @enderror"
                       placeholder="مثلا: آموزش"
                       required>
                @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- فیلد اسلاگ --}}
            <div>
                <label for="slug" class="block text-sm font-bold text-gray-700 mb-2">اسلاگ (URL)</label>
                <input type="text"
                       id="slug"
                       name="slug"
                       value="{{ old('slug', $category->slug ?? '') }}"
                       class="w-full px-4 py-2 border rounded-lg bg-gray-50 focus:outline-none focus:ring-2 focus:ring-yellow-400 @error('slug') border-red-500 @enderror"
                       placeholder="مثلا: amoozesh"
                       required>
                @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        </div>
        
        <div class="flex justify-end items-center mt-6 pt-4 border-t border-gray-200">
            <button type="submit" class="bg-[var(--brand-gold)] text-white font-bold py-2 px-6 rounded-lg hover:bg-yellow-500 transition-colors shadow-md">
                {{ isset($category) ? 'به‌روزرسانی' : 'ذخیره' }}
            </button>
        </div>
    </form>
</div>

{{-- جدول نمایش دسته‌بندی‌ها --}}
<div class="bg-white rounded-lg shadow-md p-6 lg:p-8">
    <h2 class="text-xl font-bold text-gray-800 mb-4">لیست دسته‌بندی‌ها</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tr-lg">نام</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">اسلاگ</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-center text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tl-lg">عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                <tr class="hover:bg-gray-50">
                    <td class="px-5 py-5 border-b border-gray-200 text-sm">{{ $category->name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm ltr-text">{{ $category->slug }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 text-sm text-center">
                        <div class="flex items-center justify-center space-x-2 space-x-reverse">
                            <a href="{{ route('post.category', ['category' => $category->id]) }}" class="text-yellow-600 hover:text-yellow-800">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('post.deleteCategory', $category) }}" method="POST" class="delete-form" data-name="{{ $category->name }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="px-5 py-5 text-sm text-center text-gray-500">
                        هیچ دسته‌بندی‌ای یافت نشد.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('page_js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const itemTitle = this.dataset.name;
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
                        this.submit();
                    }
                });
            });
        });
    });
</script>
@endpush
