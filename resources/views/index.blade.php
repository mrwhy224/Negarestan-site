@extends('layout')

@section('title', 'صفحه اصلی - آموزشگاه نگارستان علم')

@section('content')

    <!-- بخش اسلایدر با Swiper.js -->
    <section id="slider" class="relative w-full swiper">
        <div class="swiper-wrapper">
            <!-- Slide 1 -->
            <div class="swiper-slide">
                <img src="/images/slide1.png" alt="تصویر دانش‌آموزان موفق" class="w-full h-full object-cover">
            </div>
            <!-- Slide 2 -->
            <div class="swiper-slide">
                <img src="/images/slide2.png" alt="تصویر کلاس درس" class="w-full h-full object-cover">
            </div>
            <!-- Slide 3 -->
            <div class="swiper-slide">
                <img src="/images/slide3.png" alt="تصویر جلسه مشاوره" class="w-full h-full object-cover">
            </div>
            <!-- Slide 4 -->
            <div class="swiper-slide">
                <img src="/images/slide4.png" alt="تصویر جلسه مشاوره" class="w-full h-full object-cover">
            </div>
            <!-- Slide 5 -->
            <div class="swiper-slide">
                <img src="/images/slide5.png" alt="تصویر جلسه مشاوره" class="w-full h-full object-cover">
            </div>
            <div class="swiper-slide">
                <img src="/images/slide6.png" alt="تصویر جلسه مشاوره" class="w-full h-full object-cover">
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </section>

    <!-- بخش توضیحات و عنوان موسسه -->
    <section id="about" class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-8 leading-tight">
                <span>آموزشگاه علمی </span>
                <span class="bg-[var(--brand-gold)] text-white px-4 py-1 rounded-lg shadow-lg inline-block min-w-[150px] text-center">
                    <span id="typing-effect"></span>
                </span>
                <span>، برترین در سطح کشور</span>
            </h2>
            <p class="max-w-3xl mx-auto text-lg text-gray-600 leading-relaxed text-justify">
                در آموزشگاه علمی نگارستان علم، ما با ۳۰ سال سابقه آموزش و پرورش بهره‌گیری از برترین اساتید، منابع آموزشی به‌روز و خدمات پشتیبانی کامل، مسیر یادگیری را برای دانش‌آموزان هموار می‌کنیم.
                سیستم آموزشی ما بر پایه‌ی LMP ، یادگیری ترمیک، کلاس های VIP و تک درس، مشاوره تخصصی، پانسیون و آزمون رفع اشکال مستمر و پشتیبانی روان‌شناسی طراحی شده است تا هر دانش‌آموز بتواند با آرامش و اعتماد به نفس، به بالاترین سطح توانایی خود برسد.
                ما باور داریم که آموزش تنها انتقال دانش نیست؛ بلکه ساختن آینده‌ای است که هر روز می‌تواند درخشان‌تر، متفاوت‌تر و الهام‌بخش‌تر باشد
            </p>
        </div>
    </section>

    <!-- بخش شمارنده‌ها -->
    <section id="stats" class="py-16 sm:py-24 gradient-bg">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-20 text-center">
                <div class="bg-white/50 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200">
                    <i class="fas fa-calendar-alt text-5xl text-[var(--brand-gold)] mb-4"></i>
                    <p class="text-5xl font-bold text-gray-800 counter" data-target="30">۰</p>
                    <h3 class="text-2xl mt-2 text-gray-600">سال سابقه درخشان</h3>
                </div>
                <div class="bg-white/50 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200">
                    <i class="fas fa-user-graduate text-5xl text-[var(--brand-gold)] mb-4"></i>
                    <p class="text-5xl font-bold text-gray-800 counter" data-target="5000">۰</p>
                    <h3 class="text-2xl mt-2 text-gray-600">دانش آموز فارغ التحصیل</h3>
                </div>
                <div class="bg-white/50 backdrop-blur-sm p-8 rounded-2xl shadow-lg border border-gray-200">
                    <i class="fas fa-trophy text-5xl text-[var(--brand-gold)] mb-4"></i>
                    <p class="text-5xl font-bold text-gray-800 counter" data-target="2400">۰</p>
                    <h3 class="text-2xl mt-2 text-gray-600">رتبه برتر کنکور</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش ویژگی‌ها -->
    <section id="features" class="py-16 sm:py-24 gradient-bg">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-4">چرا آموزشگاه نگارستان علم؟</h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    ویژگی‌هایی که ما را به بهترین انتخاب برای شما تبدیل می‌کند.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-gray-50/50 border border-gray-200 p-8 rounded-2xl text-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-yellow-100 rounded-full">
                        <i class="fas fa-chalkboard-teacher text-4xl text-[var(--brand-gold)]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">روش LMP هلند</h3>
                    <p class="text-gray-600">
                        با سیستم نوین LMP، یک روز آموزش عمیق و یک روز پانسیون مطالعاتی؛ ترکیبی که باعث تثبیت یادگیری، افزایش تمرکز و کاهش استرس دانش‌آموزان می‌شود.
                    </p>
                </div>
                <div class="bg-gray-50/50 border border-gray-200 p-8 rounded-2xl text-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-yellow-100 rounded-full">
                        <i class="fas fa-tasks text-4xl text-[var(--brand-gold)]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">سیستم ترمیک</h3>
                    <p class="text-gray-600">
                        تقسیم مباحث سنگین به ترم‌های کوتاه و قابل مدیریت؛ یادگیری مرحله‌به‌مرحله با مرور و آزمون در پایان هر ترم برای ماندگاری مطالب در ذهن.
                    </p>
                </div>
                <div class="bg-gray-50/50 border border-gray-200 p-8 rounded-2xl text-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-yellow-100 rounded-full">
                        <i class="fas fa-flask text-4xl text-[var(--brand-gold)]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    کلاس‌های تیزهوشان</h3>
                    <p class="text-gray-600">
                        کلاس‌های ویژه برای دانش‌آموزان مستعد با آموزش مفهومی، حل تمرین‌های سطح بالا و آماده‌سازی برای آزمون‌های مدارس تیزهوشان.
                    </p>
                </div>
                <div class="bg-gray-50/50 border border-gray-200 p-8 rounded-2xl text-center shadow-lg transform hover:-translate-y-2 transition-transform duration-300">
                    <div class="flex items-center justify-center h-20 w-20 mx-auto mb-6 bg-yellow-100 rounded-full">
                        <i class="fas fa-headset text-4xl text-[var(--brand-gold)]"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">
                    خدمات مشاوره</h3>
                    <p class="text-gray-600">
                        مشاوره تحصیلی و روانشناسی تخصصی برای برنامه‌ریزی شخصی، مدیریت زمان، کاهش اضطراب و افزایش انگیزه در مسیر موفقیت.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- بخش فرم درخواست مشاوره -->
    <section id="contact" class="py-16 sm:py-24 gradient-bg">
        <div class="container mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 lg:flex lg:items-center lg:gap-12 max-w-5xl mx-auto">
                <div class="lg:w-1/2 text-center lg:text-right mb-8 lg:mb-0">
                    <h2 class="text-4xl md:text-4xl font-bold text-[var(--brand-blue)] mb-4">مشاوره رایگان می‌خواهید؟</h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        فرم زیر را پر کنید تا کارشناسان ما در اسرع وقت با شما تماس بگیرند و یک جلسه مشاوره تخصصی رایگان برایتان ترتیب دهند.
                    </p>
                </div>
                <div class="lg:w-1/2">
                    <form id="consultationForm" class="space-y-4">
                        <div>
                            <label for="name" class="block text-gray-700 font-bold mb-2">نام و نام خانوادگی</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-3 bg-gray-100 border-2 border-transparent rounded-lg focus:outline-none focus:border-[var(--brand-gold)] transition" required>
                        </div>
                        <div>
                            <label for="phone" class="block text-gray-700 font-bold mb-2">شماره تماس</label>
                            <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 bg-gray-100 border-2 border-transparent rounded-lg focus:outline-none focus:border-[var(--brand-gold)] transition" required>
                        </div>
                        <div>
                            <label for="grade" class="block text-gray-700 font-bold mb-2">مقطع تحصیلی</label>
                            <select id="grade" name="grade" class="w-full px-4 py-3 bg-gray-100 border-2 border-transparent rounded-lg focus:outline-none focus:border-cyan-500 transition">
                                <option>ششم</option>
                                <option>هفتم تا نهم</option>
                                <option>دهم</option>
                                <option>یازدهم</option>
                                <option>دوازدهم</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full bg-[var(--brand-gold)] text-white font-bold py-3 px-6 rounded-lg hover:brightness-95 transition duration-300 text-lg shadow-md">
                            ارسال درخواست
                        </button>
                    </form>
                    <div id="form-message" class="mt-4 text-center"></div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- بخش پکیج‌های آموزشی -->
    <section id="packages" class="py-16 sm:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-4">پکیج‌های ویژه آموزشی</h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    برای هر هدفی، یک مسیر ویژه طراحی کرده‌ایم.
                </p>
            </div>
            <div class="space-y-20">
                @foreach($classes as $index => $class)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                        {{-- [تغییر] تصویر قبل از متن قرار گرفت تا در موبایل ابتدا نمایش داده شود --}}
                        <div class="{{ $index % 2 == 1 ? 'md:order-2' : '' }}">
                            <img src="{{ Storage::url($class->image) }}" alt="{{ $class->title }}" class="w-full h-auto object-cover rounded-2xl shadow-xl transform hover:scale-105 transition-transform duration-500">
                        </div>
                        {{-- [تغییر] ترتیب متن برای دسکتاپ بر اساس زوج یا فرد بودن ردیف تنظیم شد --}}
                        <div class="{{ $index % 2 == 1 ? 'md:order-1' : '' }} text-center md:text-right">
                            <h3 class="text-3xl font-bold text-[var(--brand-blue)] mb-4">{{ $class->title }}</h3>
                            <p class="text-gray-600 leading-loose text-lg text-justify">
                                {{ $class->excerpt }}
                            </p>
                            <a href="{{ route('single',['post'=>$class->slug]) }}" class="mt-6 inline-block bg-[var(--brand-gold)] text-white font-bold py-3 px-8 rounded-lg hover:brightness-95 transition duration-300 text-lg shadow-md">
                                مشاهده جزئیات
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- بخش وبلاگ -->
    <section id="blog" class="py-16 sm:py-24 bg-white">
        <div class="container max-w-screen-xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-[var(--brand-blue)] mb-4">آخرین مقالات و وبلاگ</h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600">
                    نکات مشاوره‌ای، اخبار تحصیلی و راهنمای انتخاب رشته را اینجا بخوانید.
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
                @foreach($posts as $index => $post)
                    <a href="{{ route('single',['post'=>$post->slug]) }}" class="bg-white rounded-2xl shadow-lg overflow-hidden block group transform hover:-translate-y-1 transition-all duration-300 h-full flex flex-col">
                        <div class="relative">
                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-48 object-cover">
                            <div class="absolute top-3 left-3 bg-[var(--brand-gold)] text-white text-xs font-bold py-1 px-2.5 rounded-full shadow">{{ $post->category->name }}</div>
                        </div>
                        <div class="p-4 flex-grow flex flex-col">
                            <h4 class="font-bold text-lg text-gray-800 mb-3 group-hover:text-[var(--brand-gold)] transition">{{ $post->title }}</h4>
                            <p class="text-gray-600 mb-4 flex-grow">{{ $post->excerpt }}</p>
                            <div class="pt-4 flex justify-between items-center text-sm text-gray-500 border-t border-gray-200 mt-auto">
                                <span><i class="fas fa-user ml-2"></i>{{ $post->author->name }}</span>
                                <span><i class="fas fa-calendar-alt ml-2"></i>{{ jdate($post->created_at)->format('j F Y') }}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('blog') }}" class="inline-block font-bold py-3 px-8 rounded-lg hover:translate-y-1 transition duration-300 text-lg">
                    مشاهده بیشتر
                </a>
            </div>
        </div>
    </section>



@endsection

