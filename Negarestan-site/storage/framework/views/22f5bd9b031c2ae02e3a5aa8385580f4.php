<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ثبت نام - آموزشگاه آینده</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet" />
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

  <style>
    :root {
      --brand-gold: #f5b301;
      --brand-blue: #1c3d5a;
    }
    body {
      font-family: 'Vazirmatn', sans-serif;
      background-color: #f0f2f5;
      background-image: radial-gradient(circle at 1px 1px, #d1d5db 1px, transparent 0);
      background-size: 25px 25px;
    }
    .fantasy-font { font-family: 'Lalezar', cursive; }
    .form-input:focus {
      border-color: var(--brand-gold);
      box-shadow: 0 0 0 2px rgba(245, 179, 1, 0.2);
    }
    .brand-gradient-text {
      background: -webkit-linear-gradient(45deg, var(--brand-gold), #ffcc33);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <!-- Toast root (گوشهٔ صفحه) -->
  <div id="toast-root" class="fixed bottom-4 right-4 z-50 space-y-2 pointer-events-none"></div>

  <div class="flex flex-col md:flex-row w-full max-w-4xl bg-white shadow-2xl rounded-2xl overflow-hidden m-8">
    <!-- Form Section -->
    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
      <div class="text-center mb-8">
        <a href="<?php echo e(route('home')); ?>"><img src="/logo.png" alt="Logo" class="w-[15rem] mx-auto mb-4 p-2 rounded-lg" /></a>
        <h1 class="text-3xl font-bold text-[var(--brand-blue)] fantasy-font">ثبت نام</h1>
        <p class="text-gray-500 mt-2">به خانواده ما خوش آمدید! اطلاعات خود را وارد کنید.</p>
      </div>

      <!-- لینک لاگین برای استفاده در ریدایرکت -->
      <span id="login-url" data-login-url="<?php echo e(route('login')); ?>" hidden></span>

      <form id="registration-form" class="space-y-6" novalidate>
        <?php echo csrf_field(); ?>
        <div>
          <label for="name" class="block text-sm font-bold text-gray-700 mb-2">نام و نام خانوادگی</label>
          <div class="relative">
            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
              <i class="fas fa-user text-gray-400"></i>
            </span>
            <input type="text" id="name" name="name" placeholder="نام و نام خانوادگی خود را وارد کنید" class="form-input w-full pr-10 pl-3 py-3 bg-gray-100 border-2 border-transparent rounded-lg transition duration-300 focus:outline-none focus:bg-white" required />
          </div>
        </div>

        <div>
          <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">شماره تلفن</label>
          <div class="relative">
            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
              <i class="fas fa-phone text-gray-400"></i>
            </span>
            <input type="tel" id="phone" name="phone" placeholder="مثال: 09121234567" class="form-input w-full pr-10 pl-3 py-3 bg-gray-100 border-2 border-transparent rounded-lg transition duration-300 focus:outline-none focus:bg-white" required />
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-bold text-gray-700 mb-2">رمز عبور</label>
          <div class="relative">
            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
              <i class="fas fa-lock text-gray-400"></i>
            </span>
            <input type="password" id="password" name="password" placeholder="رمز عبور خود را وارد کنید" class="form-input w-full pr-10 pl-3 py-3 bg-gray-100 border-2 border-transparent rounded-lg transition duration-300 focus:outline-none focus:bg-white" required />
          </div>
        </div>

        <div>
          <label for="password_confirmation" class="block text-sm font-bold text-gray-700 mb-2">تکرار رمز عبور</label>
          <div class="relative">
            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
              <i class="fas fa-lock text-gray-400"></i>
            </span>
            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="رمز عبور را مجدداً وارد کنید" class="form-input w-full pr-10 pl-3 py-3 bg-gray-100 border-2 border-transparent rounded-lg transition duration-300 focus:outline-none focus:bg-white" required />
          </div>
        </div>

        <div>
          <button id="submit-btn" type="submit" class="w-full bg-[var(--brand-gold)] text-white font-bold py-3 px-4 rounded-lg hover:brightness-110 transition duration-300 shadow-lg text-lg flex items-center justify-center gap-2">
            <span class="btn-text">ثبت نام</span>
            <span class="btn-spinner hidden animate-spin"><i class="fa-solid fa-circle-notch"></i></span>
          </button>
        </div>
      </form>

      <p class="text-center text-sm text-gray-500 mt-8">
        قبلاً حساب کاربری دارید؟
        <a href="<?php echo e(route('login')); ?>" class="font-bold text-[var(--brand-blue)] hover:underline">ورود</a>
      </p>
    </div>

    <!-- Image Section -->
    <div class="hidden md:flex w-1/2 bg-[var(--brand-blue)] items-center justify-center p-12 text-white text-center flex-col rounded-l-2xl">
      <h2 class="text-4xl font-bold fantasy-font brand-gradient-text mb-4">بهترین انتخاب برای آینده</h2>
      <p class="mt-4 text-lg text-gray-300 max-w-sm">یادگیری آسان و مسیر موفقیت تحصیلی شما از اینجا آغاز می‌شود. به ما بپیوندید.</p>
      <div class="w-40 h-1 bg-[var(--brand-gold)] rounded-full my-8"></div>
    </div>
  </div>

  <script>
    // --- Toast helper ---
    const toastRoot = document.getElementById('toast-root');

    function iconFor(type) {
      switch (type) {
        case 'success': return 'fa-circle-check';
        case 'error':   return 'fa-triangle-exclamation';
        case 'info':    return 'fa-circle-info';
        case 'warning': return 'fa-exclamation-circle';
        default:        return 'fa-bell';
      }
    }

    function colorFor(type) {
      switch (type) {
        case 'success': return 'border-green-500/30 bg-green-50 text-green-800';
        case 'error':   return 'border-red-500/30 bg-red-50 text-red-800';
        case 'info':    return 'border-blue-500/30 bg-blue-50 text-blue-800';
        case 'warning': return 'border-amber-500/30 bg-amber-50 text-amber-800';
        default:        return 'border-slate-300 bg-white text-slate-800';
      }
    }

    /**
     * Show a toast in the corner.
     * @param {Object} opts
     * @param {'success'|'error'|'info'|'warning'} opts.type
     * @param {string} opts.message
     * @param {number} [opts.duration=3500]
     */
    function showToast({ type = 'info', message = '', duration = 3500 } = {}) {
      const wrapper = document.createElement('div');
      wrapper.className = `pointer-events-auto rounded-xl shadow-lg border ${colorFor(type)} opacity-0 translate-y-3 transition-all duration-300 max-w-xs w-[22rem]`;
      wrapper.setAttribute('role', 'alert');
      wrapper.innerHTML = `
        <div class="p-4 flex items-start gap-3">
          <div class="flex-shrink-0 mt-1"><i class="fa-solid ${iconFor(type)}"></i></div>
          <div class="flex-1 text-sm leading-6">${message}</div>
          <button type="button" class="close text-slate-400 hover:text-slate-600" aria-label="بستن">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>
      `;

      toastRoot.appendChild(wrapper);
      // enter animation
      requestAnimationFrame(() => {
        wrapper.classList.remove('opacity-0', 'translate-y-3');
      });

      const remove = () => {
        wrapper.classList.add('opacity-0', 'translate-y-3');
        setTimeout(() => wrapper.remove(), 250);
      };

      const timer = setTimeout(remove, duration);
      wrapper.querySelector('.close').addEventListener('click', () => {
        clearTimeout(timer);
        remove();
      });

      return { remove };
    }

    // --- Form logic ---
    const form = document.getElementById('registration-form');
    const submitBtn = document.getElementById('submit-btn');
    const btnText = submitBtn.querySelector('.btn-text');
    const btnSpinner = submitBtn.querySelector('.btn-spinner');
    const loginUrl = document.getElementById('login-url')?.dataset?.loginUrl || '/login';

    function setLoading(state) {
      submitBtn.disabled = state;
      submitBtn.classList.toggle('opacity-70', state);
      btnSpinner.classList.toggle('hidden', !state);
    }

    form.addEventListener('submit', async (e) => {
      e.preventDefault();

      // Basic front validation (example)
      const pwd = form.password.value.trim();
      const pwd2 = form.password_confirmation.value.trim();
      if (pwd && pwd2 && pwd !== pwd2) {
        showToast({ type: 'error', message: 'رمز عبور و تکرار آن یکسان نیست.' });
        return;
      }

      // Collect data
      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());

      setLoading(true);

      try {
        const response = await fetch('/api/register', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data),
          credentials: 'same-origin',
        });

        // Attempt to parse JSON safely
        let result = {};
        try { result = await response.json(); } catch (_) {}

        if (response.ok) {
          form.reset();
          showToast({ type: 'success', message: result.message || 'ثبت‌نام با موفقیت انجام شد. در حال هدایت به صفحهٔ ورود...' });
          // Redirect a few seconds later
          setTimeout(() => { window.location.assign(result.redirect_to || loginUrl); }, 2200);
        } else if (response.status === 422 && result?.errors) {
          // Laravel validation errors
          const firstKey = Object.keys(result.errors)[0];
          Object.values(result.errors).flat().forEach((msg, i) => {
            showToast({ type: 'error', message: msg, duration: Math.min(5000 + i * 300, 8000) });
          });
          // focus first invalid field if available
          if (firstKey && form[firstKey]) form[firstKey].focus();
        } else {
          showToast({ type: 'error', message: result.error || 'خطایی در ثبت‌نام رخ داد. دوباره تلاش کنید.' });
        }
      } catch (err) {
        showToast({ type: 'error', message: 'ارتباط با سرور برقرار نشد. اتصال اینترنت یا سرور را بررسی کنید.' });
      } finally {
        setLoading(false);
      }
    });
  </script>
</body>
</html>
<?php /**PATH D:\programming projects\laravel\negarestan\resources\views/panel/register.blade.php ENDPATH**/ ?>