@extends('layout')

{{-- [نکته] عنوان صفحه به صورت داینامیک از عنوان پست گرفته می‌شود --}}
@section('title', $post->title . ' - آموزشگاه نگارستان علم')

@section('content')
    <section class="py-12 sm:py-20 bg-white">
        <div class="container mx-auto px-6 max-w-7xl">
            @if($post)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                    {{-- [اصلاح] محتوای اصلی به ابتدای کد منتقل شد تا در موبایل بالاتر نمایش داده شود --}}
                    <!-- Main Content Area (2/3 width) -->
                    <div class="lg:col-span-2">

                        <!-- Featured Image -->
                        @if($post->image)
                            <div class="mb-8">
                                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-auto max-h-[500px] object-cover rounded-2xl shadow-xl">
                            </div>
                        @endif

                        <!-- Article Header & Metadata -->
                        <div class="pb-6 border-b border-gray-200 mb-8">
                            <h1 class="text-4xl md:text-5xl font-extrabold fantasy-font text-[var(--brand-blue)] mb-4 leading-snug">{{ $post->title }}</h1>
                            <div class="flex flex-wrap items-center text-gray-500 text-sm gap-y-2">
                                <span class="text-gray-600 font-medium ml-4">
                                    <i class="fas fa-user ml-2"></i>نویسنده: <b>{{ $post->author->name }}</b>
                                </span>
                                <span class="mx-4 text-gray-400 hidden sm:inline">|</span>
                                <span class="text-gray-600 font-medium ml-4">
                                    <i class="fas fa-calendar-alt ml-2"></i>تاریخ: {{ jdate($post->created_at)->format('j F Y') }}
                                </span>
                                @if($post->category)
                                    <span class="mx-4 text-gray-400 hidden sm:inline">|</span>
                                    <span class="bg-[var(--brand-gold)] text-white text-xs font-bold py-1 px-2.5 rounded-full shadow">{{ $post->category->name }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Article Content (Server-Side Rendered HTML) -->
                        <div class="post-content prose lg:prose-lg max-w-none text-justify leading-loose">
                            {!! $post->body !!} {{-- معمولا محتوای کامل در ستون body است --}}
                        </div>

                        <!-- Share Buttons -->
                        <div class="mt-12 pt-6 border-t border-gray-200 flex justify-between items-center">
                            <span class="text-lg font-bold text-[var(--brand-blue)]">به اشتراک بگذارید:</span>
                            <div class="flex space-x-4 space-x-reverse">
                                <a href="#" class="text-2xl text-blue-600 hover:text-blue-700"><i class="fab fa-telegram"></i></a>
                                <a href="#" class="text-2xl text-pink-600 hover:text-pink-700"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="text-2xl text-gray-600 hover:text-gray-700"><i class="fas fa-link"></i></a>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div id="comments" class="mt-16 pt-10 border-t-4 border-[var(--brand-gold)]">
                            <h2 class="text-3xl font-bold text-[var(--brand-blue)] mb-8">نظرات ({{ count($post->comments) }})</h2>

                            <!-- Comment Form -->
                            <form class="space-y-6 bg-gray-50 p-6 rounded-xl shadow-inner mb-10">
                                <h3 class="text-xl font-bold text-gray-700">نظر خود را بنویسید</h3>
                                <div>
                                    <label for="comment-name" class="block text-sm font-medium text-gray-700 mb-1">نام</label>
                                    <input type="text" id="comment-name" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-gold)]" required>
                                </div>
                                <div>
                                    <label for="comment-body" class="block text-sm font-medium text-gray-700 mb-1">متن نظر</label>
                                    <textarea id="comment-body" rows="4" class="w-full px-4 py-3 bg-white border border-gray-300 rounded-lg focus:outline-none focus:border-[var(--brand-gold)]" required></textarea>
                                </div>
                                <button type="submit" class="bg-[var(--brand-blue)] text-white font-bold py-3 px-8 rounded-lg hover:bg-[#0f293b] transition duration-300 shadow-md">
                                    ارسال نظر
                                </button>
                            </form>

                            <!-- List of Comments -->
                            <div class="space-y-8">
                                @forelse($post->comments as $comment)
                                <div class="border-b pb-4">
                                    <div class="flex items-center mb-2">
                                        <div class="w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white font-bold text-lg ml-3">{{ Str::substr($comment->author_name, 0, 1) }}</div>
                                        <div>
                                            <p class="font-bold text-gray-800">{{ $comment->author_name }}</p>
                                            <p class="text-xs text-gray-500">تاریخ: {{ $comment->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <p class="text-gray-700 pr-12">{{ $comment->body }}</p>
                                </div>
                                @empty
                                    <p class="text-gray-500 text-center">هنوز نظری برای این پست ثبت نشده است.</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    {{-- [اصلاح] سایدبار به انتهای کد منتقل شد تا در موبایل پایین‌تر نمایش داده شود --}}
                    <!-- Sidebar (1/3 width) -->
                    <div class="lg:col-span-1 space-y-10">

                        <!-- About Author -->
                        <div class="bg-gray-100 p-6 rounded-xl shadow-lg border-t-4 border-[var(--brand-gold)]">
                            <h3 class="text-xl font-bold text-[var(--brand-blue)] mb-4 border-b pb-2">درباره نویسنده</h3>
                            <div class="flex items-center mb-4">
                                <img src="https://placehold.co/80x80/12324c/f5b301?text=A" alt="نویسنده" class="w-16 h-16 rounded-full object-cover ml-4 shadow-md">
                                <div>
                                    <p class="font-bold text-lg text-gray-800">{{ $post->author->name }}</p>
                                    <p class="text-sm text-gray-500">مشاور ارشد تحصیلی</p>
                                </div>
                            </div>
                            <p class="text-gray-600 text-sm">
                                {{ $post->author->name }} بیش از ۱۰ سال سابقه مشاوره در زمینه کنکور را دارد و در حوزه برنامه‌ریزی و مدیریت زمان متخصص است.
                            </p>
                        </div>

                        <!-- Related Posts (Mockup) -->
                        <div class="bg-white p-6 rounded-xl shadow-lg border-t-4 border-blue-400">
                            <h3 class="text-xl font-bold text-[var(--brand-blue)] mb-4 border-b pb-2">مقالات مرتبط</h3>
                            <ul class="space-y-4">
                                <li class="text-gray-700 hover:text-[var(--brand-gold)] transition">
                                    <a href="#" class="block"><i class="fas fa-chevron-left text-xs ml-2"></i>۵ اشتباه رایج در آزمون‌های آزمایشی</a>
                                </li>
                                <li class="text-gray-700 hover:text-[var(--brand-gold)] transition">
                                    <a href="#" class="block"><i class="fas fa-chevron-left text-xs ml-2"></i>بهترین روش‌های خلاصه‌نویسی</a>
                                </li>
                                <li class="text-gray-700 hover:text-[var(--brand-gold)] transition">
                                    <a href="#" class="block"><i class="fas fa-chevron-left text-xs ml-2"></i>چگونه استرس کنکور را مدیریت کنیم؟</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Call to Action -->
                        <div class="bg-[var(--brand-gold)] p-6 rounded-xl text-white shadow-2xl text-center">
                            <h3 class="text-2xl font-bold mb-3 fantasy-font">مشاوره رایگان</h3>
                            <p class="text-sm mb-4">با یک جلسه مشاوره رایگان، برنامه مطالعاتی خود را بهینه کنید.</p>
                            <a href="{{ route('home') }}#contact" class="bg-white text-[var(--brand-blue)] font-bold py-2 px-6 rounded-lg hover:shadow-lg transition">ثبت درخواست</a>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-12 text-gray-500">
                    <i class="fas fa-exclamation-triangle text-4xl mb-4"></i>
                    <p class="text-lg font-semibold">مقاله مورد نظر یافت نشد!</p>
                </div>
            @endif
        </div>
    </section>
@endsection