@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        {{-- بخش موبایل (ساده شده) --}}
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    قبلی
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 transition ease-in-out duration-150">
                    قبلی
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 transition ease-in-out duration-150">
                    بعدی
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                    بعدی
                </span>
            @endif
        </div>

        {{-- بخش کامل صفحه‌بندی برای دسکتاپ --}}
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700 leading-5">
                    نمایش
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    تا
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    از
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    نتیجه
                </p>
            </div>

            <div class="flex items-center space-x-1 space-x-reverse">
                {{-- دکمه صفحه بعدی (در سمت راست) --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="Previous" class="flex items-center justify-center w-10 h-10 rounded-md bg-gray-100 text-gray-400 border border-gray-300 cursor-not-allowed">
                        <i class="fas fa-chevron-right"></i>
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="flex items-center justify-center w-10 h-10 rounded-md bg-white text-gray-600 border border-gray-300 hover:bg-yellow-50 transition-colors" aria-label="Previous">
                        <i class="fas fa-chevron-right"></i>
                    </a>
                @endif

                {{-- شماره صفحات --}}
                @foreach ($elements as $element)
                    {{-- سه نقطه (...) --}}
                    @if (is_string($element))
                        <span aria-disabled="true" class="flex items-center justify-center w-10 h-10 rounded-md bg-white text-gray-500 border border-gray-300">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- آرایه‌ای از لینک‌ها --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page" class="flex items-center justify-center w-10 h-10 rounded-md bg-[var(--brand-gold)] text-white font-bold border-2 border-yellow-400 shadow-sm">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="flex items-center justify-center w-10 h-10 rounded-md bg-white text-gray-600 border border-gray-300 hover:bg-yellow-50 transition-colors" aria-label="Go to page {{ $page }}">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- دکمه صفحه قبلی (در سمت چپ) --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="flex items-center justify-center w-10 h-10 rounded-md bg-white text-gray-600 border border-gray-300 hover:bg-yellow-50 transition-colors" aria-label="Next">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                @else
                    <span aria-disabled="true" aria-label="Next" class="flex items-center justify-center w-10 h-10 rounded-md bg-gray-100 text-gray-400 border border-gray-300 cursor-not-allowed">
                        <i class="fas fa-chevron-left"></i>
                    </span>
                @endif
            </div>
        </div>
    </nav>
@endif

