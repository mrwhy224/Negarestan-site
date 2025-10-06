@extends('layout')

@section('title', 'وبلاگ - وب‌سایت آموزشگاه')

@section('content')

    {{-- بخش معرفی وبلاگ --}}
    <section class="py-16 md:py-24 text-center gradient-bg">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-4">وبلاگ آموزشی ما</h1>
            <p class="max-w-3xl mx-auto text-lg text-gray-600">
                جدیدترین مقالات، نکات مشاوره‌ای و اخبار تحصیلی را در اینجا دنبال کنید. ما به شما کمک می‌کنیم تا مسیر موفقیت را هوشمندانه‌تر طی کنید.
            </p>
        </div>
    </section>

    {{-- بخش اصلی مقالات --}}
    <section class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-6">
            {{-- نوار فیلتر و جستجو --}}
            <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
                {{-- دسته‌بندی‌ها --}}
                <div class="flex flex-wrap justify-center gap-2">
                    <a href="{{ route('blog') }}" class="{{ !request('category') ? 'bg-[var(--brand-blue)] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} py-2 px-4 rounded-full text-sm font-semibold shadow-md transition">همه مقالات</a>
                    @foreach($categories as $category)
                        <a href="{{ route('blog.category', ['category' => $category->slug]) }}" class="{{ request('category') == $category->slug ? 'bg-[var(--brand-blue)] text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }} py-2 px-4 rounded-full text-sm transition">{{ $category->name }}</a>
                    @endforeach
                </div>
                {{-- فرم جستجو --}}
                <form action="{{ route('blog') }}" method="GET" class="relative w-full md:w-auto">
                    <input type="text" name="search" placeholder="جستجو در مقالات..." value="{{ request('search') }}" class="w-full md:w-64 pl-10 pr-4 py-2 bg-gray-100 border-2 border-transparent rounded-full focus:outline-none focus:border-[var(--brand-gold)] transition">
                    <button type="submit" class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            {{-- گرید مقالات --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden group transform hover:-translate-y-2 transition-all duration-300 flex flex-col">
                        <a href="{{ route('single',['post'=>$post->slug]) }}" class="block">
                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-56 object-cover">
                        </a>
                        <div class="p-6 flex-grow flex flex-col">
                            <div class="mb-4">
                               <a href="{{ route('blog.category', ['category' => $post->category->slug]) }}" class="text-sm font-bold text-[var(--brand-gold)]">{{ $post->category->name }}</a>
                            </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3 group-hover:text-[var(--brand-blue)] transition">
                               <a href="{{ route('single',['post'=>$post->slug]) }}">{{ $post->title }}</a>
                            </h3>
                            <p class="text-gray-600 mb-4 flex-grow text-justify">
                                {{ $post->excerpt }}
                            </p>
                            <div class="pt-4 flex justify-between items-center text-sm text-gray-500 border-t border-gray-200 mt-auto">
                               <span><i class="fas fa-user ml-2"></i>{{ $post->author->name }}</span>
                               <span><i class="fas fa-calendar-alt ml-2"></i>{{ jdate($post->published_at)->format('%d %B %Y') }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-12">
                        <p class="text-gray-500 text-lg">مقاله‌ای برای نمایش یافت نشد.</p>
                    </div>
                @endforelse
            </div>

            {{-- صفحه‌بندی --}}
            <div class="flex justify-center mt-16">
                {{ $posts->withQueryString()->links() }}
            </div>
        </div>
    </section>

@endsection
