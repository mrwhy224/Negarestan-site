<!-- فوتر -->
<footer class="w-full pt-16 bg-gray-100">
    <div class="max-w-[1140px] w-full mx-auto md:pb-10">
        <div class="bg-[var(--brand-blue)] text-white pt-12 pb-8 rounded-none md:rounded-2xl shadow-2xl">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div>
                        <img src="{{ asset('logo.png') }}" alt="logo" class="h-24 w-auto mb-4 mx-auto bg-white p-2 rounded-lg">
                        <p class="text-gray-400">
                            مسیر موفقیت تحصیلی شما از اینجا آغاز می‌شود. با ما همراه باشید.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">دسترسی سریع</h3>
                        <ul class="space-y-2">
                            <li><a href="#about" class="text-gray-400 hover:text-white transition">درباره ما</a></li>
                            <li><a href="#packages" class="text-gray-400 hover:text-white transition">پکیج‌ها</a></li>
                            <li><a href="#contact" class="text-gray-400 hover:text-white transition">تماس با ما</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">اطلاعات تماس</h3>
                        <ul class="space-y-2 text-gray-400">
                            <li><i class="fas fa-map-marker-alt ml-2 text-[var(--brand-gold)]"></i>آدرس: تهران، خیابان سپهبد قرنی، بالاتر از طالقانی خیابان شاداب غربی پلاک ۱۹ نگارستان علم</li>
                            <li><i class="fas fa-phone ml-2 text-[var(--brand-gold)]"></i>تلفن: ۰۲۱۸۸۹۱۴۱۰</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">ما را دنبال کنید</h3>
                        <div class="flex space-x-4 space-x-reverse">
                            <a href="https://www.instagram.com/negarestanelm" class="text-gray-400 hover:text-white text-2xl transition"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white text-2xl transition"><i class="fab fa-telegram"></i></a>
                            <a href="#" class="text-gray-400 hover:text-white text-2xl transition"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
                <div class="border-t border-gray-600 text-center pt-6">
                    <p class="text-gray-400">&copy; ۱۴۰۴ تمام حقوق برای آموزشگاه نگارستان علم محفوظ است.</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Swiper.js JS -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- مقداردهی اولیه Swiper.js ---
        const swiper = new Swiper('.swiper', {
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });

        // --- اسکریپت شمارنده‌ها ---
        const counters = document.querySelectorAll('.counter');
        const speed = 200;
        const animateCounters = (entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = +counter.getAttribute('data-target');
                    let count = 0;
                    const updateCount = () => {
                        const inc = Math.ceil(target / speed);
                        count = Math.min(count + inc, target);
                        counter.innerText = count.toLocaleString('fa') + "+ ";
                        if (count < target) {
                            setTimeout(updateCount, 15);
                        }
                    };
                    updateCount();
                    observer.unobserve(counter);
                }
            });
        };
        const observer = new IntersectionObserver(animateCounters, {
            root: null,
            threshold: 0.5
        });
        counters.forEach(counter => {
            observer.observe(counter);
        });

        // --- اسکریپت فرم مشاوره ---
        const form = document.getElementById('consultationForm');
        const formMessage = document.getElementById('form-message');
        if (form) {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                formMessage.textContent = 'در حال ارسال درخواست...';
                formMessage.className = 'text-blue-600';
                const formData = new FormData(form);
                const data = Object.fromEntries(formData.entries());
                try {
                    const response = await fetch('/api/user-forms', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify(data)
                    });
                    if (!response.ok) {
                        throw new Error('Server responded with an error');
                    }
                    formMessage.textContent = 'درخواست شما با موفقیت ثبت شد! به زودی با شما تماس می‌گیریم.';
                    formMessage.className = 'text-green-600 font-bold';
                    form.reset();
                } catch (error) {
                    console.error('Error submitting form:', error);
                    formMessage.textContent = 'خطا در ارسال درخواست. لطفا دوباره تلاش کنید.';
                    formMessage.className = 'text-red-600 font-bold';
                }
            });
        }

        // --- انیمیشن تایپ ---
        const typingElement = document.getElementById('typing-effect');
        if (typingElement) {
            const words = ["آینده", "موفقیت", "رویاهایتان"];
            let wordIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            function type() {
                const currentWord = words[wordIndex];
                if (isDeleting) {
                    typingElement.textContent = currentWord.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typingElement.textContent = currentWord.substring(0, charIndex + 1);
                    charIndex++;
                }
                if (!isDeleting && charIndex === currentWord.length) {
                    isDeleting = true;
                    setTimeout(type, 2000);
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    wordIndex = (wordIndex + 1) % words.length;
                    setTimeout(type, 500);
                } else {
                    const typingSpeed = isDeleting ? 100 : 150;
                    setTimeout(type, typingSpeed);
                }
            }
            type();
        }
    });
</script>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // --- اسکریپت منوی موبایل ---
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuContent = document.getElementById('mobile-menu-content');
        const closeMenuButton = document.getElementById('close-menu-button');

        function openMenu() {
            mobileMenu.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.remove('opacity-0');
                mobileMenuContent.classList.remove('translate-x-full');
            }, 10);
        }

        function closeMenu() {
            mobileMenu.classList.add('opacity-0');
            mobileMenuContent.classList.add('translate-x-full');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        }

        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', openMenu);
        }
        
        if (closeMenuButton) {
            closeMenuButton.addEventListener('click', closeMenu);
        }

        if (mobileMenu) {
            mobileMenu.addEventListener('click', (e) => {
                if (e.target === mobileMenu) {
                    closeMenu();
                }
            });
        }
    });
</script>
@endpush

