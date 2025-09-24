<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ورود به حساب کاربری - آموزشگاه آینده</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet" />
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

  <style>
    :root { --brand-gold: #f5b301; --brand-blue: #1c3d5a; }
    body {
      font-family: 'Vazirmatn', sans-serif;
      background-color: #f0f2f5;
      background-image: radial-gradient(circle at 1px 1px, #d1d5db 1px, transparent 0);
      background-size: 25px 25px;
    }
    .fantasy-font { font-family: 'Lalezar', cursive; }
    .form-input:focus { border-color: var(--brand-gold); box-shadow: 0 0 0 2px rgba(245,179,1,.2); }
    .brand-gradient-text { background: -webkit-linear-gradient(45deg, var(--brand-gold), #ffcc33); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
    .password-input {
    direction: ltr; /* متن تایپ شده چپ چین */
    text-align: left;
    }
    .password-input::placeholder {
    direction: rtl; /* placeholder راست چین */
    text-align: right;
    }
  </style>
</head>
<body class="flex items-center justify-center min-h-screen">
  <!-- Toast root (نوتیف گوشه صفحه) -->
  <div id="toast-root" class="fixed bottom-4 right-4 z-50 space-y-2 pointer-events-none"></div>

  <div class="flex flex-col md:flex-row w-full max-w-4xl  bg-white shadow-2xl rounded-2xl overflow-hidden m-8">
    <!-- Form Section (ظاهر بدون تغییر) -->
    <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
      <div class="text-center mb-8">
        <a href="{{ route('home') }}"><img src="/logo.png" alt="Logo" class="w-[15rem] mx-auto mb-4 p-2 rounded-lg" /></a>
        <h1 class="text-3xl font-bold text-[var(--brand-blue)] fantasy-font">ورود به حساب کاربری</h1>
        <p class="text-gray-500 mt-2">خوشحالیم که دوباره شما را می‌بینیم!</p>
      </div>

      <form id="login-form" action="#" class="space-y-6" novalidate>
        @csrf
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
            <input type="password" id="password" name="password" placeholder="رمز عبور خود را وارد کنید" class="form-input password-input w-full pr-10 pl-3 py-3 bg-gray-100 border-2 border-transparent rounded-lg transition duration-300 focus:outline-none focus:bg-white" required />
          </div>
        </div>

        <div class="flex items-center justify-between text-sm">
          <a href="{{ route('forgot_password') }}" class="font-semibold text-gray-500 hover:text-[var(--brand-blue)] transition">فراموشی رمز عبور</a>
        </div>

        <div>
          <button id="login-btn" type="submit" class="w-full bg-[var(--brand-gold)] text-white font-bold py-3 px-4 rounded-lg hover:brightness-110 transition duration-300 shadow-lg text-lg flex items-center justify-center gap-2">
            <span class="btn-text">ورود</span>
            <span class="btn-spinner hidden animate-spin"><i class="fa-solid fa-circle-notch"></i></span>
          </button>
        </div>
      </form>

      <p class="text-center text-sm text-gray-500 mt-8">
        حساب کاربری ندارید؟
        <a href="{{ route('register') }}" class="font-bold text-[var(--brand-blue)] hover:underline">ثبت نام کنید</a>
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
    // ---- Toast utilities (مشابه صفحه ثبت‌نام) ----
    const toastRoot = document.getElementById('toast-root');

    function iconFor(type){
      switch(type){
        case 'success': return 'fa-circle-check';
        case 'error': return 'fa-triangle-exclamation';
        case 'info': return 'fa-circle-info';
        case 'warning': return 'fa-exclamation-circle';
        default: return 'fa-bell';
      }
    }
    function colorFor(type){
      switch(type){
        case 'success': return 'border-green-500/30 bg-green-50 text-green-800';
        case 'error': return 'border-red-500/30 bg-red-50 text-red-800';
        case 'info': return 'border-blue-500/30 bg-blue-50 text-blue-800';
        case 'warning': return 'border-amber-500/30 bg-amber-50 text-amber-800';
        default: return 'border-slate-300 bg-white text-slate-800';
      }
    }
    function showToast({type='info', message='', duration=3500}={}){
      const el = document.createElement('div');
      el.className = `pointer-events-auto rounded-xl shadow-lg border ${colorFor(type)} opacity-0 translate-y-3 transition-all duration-300 max-w-xs w-[22rem]`;
      el.setAttribute('role','alert');
      el.innerHTML = `
        <div class="p-4 flex items-start gap-3">
          <div class="flex-shrink-0 mt-1"><i class="fa-solid ${iconFor(type)}"></i></div>
          <div class="flex-1 text-sm leading-6">${message}</div>
          <button type="button" class="close text-slate-400 hover:text-slate-600" aria-label="بستن">
            <i class="fa-solid fa-xmark"></i>
          </button>
        </div>`;
      toastRoot.appendChild(el);
      requestAnimationFrame(()=>{ el.classList.remove('opacity-0','translate-y-3'); });
      const remove=()=>{ el.classList.add('opacity-0','translate-y-3'); setTimeout(()=>el.remove(),250); };
      const t=setTimeout(remove,duration);
      el.querySelector('.close').addEventListener('click',()=>{ clearTimeout(t); remove(); });
      return { remove };
    }

    // ---- Login logic ----
    const form = document.getElementById('login-form');
    const btn = document.getElementById('login-btn');
    const btnText = btn.querySelector('.btn-text');
    const btnSpinner = btn.querySelector('.btn-spinner');

    function setLoading(state){
      btn.disabled = state;
      btn.classList.toggle('opacity-70', state);
      btnSpinner.classList.toggle('hidden', !state);
    }

    form.addEventListener('submit', async (e)=>{
      e.preventDefault();

      // quick front validation
      const phone = form.phone.value.trim();
      const password = form.password.value.trim();
      if(!phone || !password){
        showToast({type:'error', message:'ایمیل و رمز عبور را کامل وارد کنید.'});
        return;
      }


      // collect payload
      const payload = { phone, password };

      // CSRF token (Laravel)
      const csrf = (form.querySelector('input[name=_token]')||{}).value;

      setLoading(true);
      try{
        const res = await fetch('/api/login', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
            ...(csrf ? { 'X-CSRF-TOKEN': csrf } : {})
          },
          body: JSON.stringify(payload),
          credentials: 'same-origin'
        });

        let result = {};
        try { result = await res.json(); } catch(_) {}

        if(res.ok){
          // انتظار داریم سرور لینک ریدایرکت بده
          const redirectTo = result.redirect_to || result.redirect || result.url || result.location || '/';
          showToast({ type:'success', message: result.message || 'ورود موفق. در حال هدایت...' });
          setTimeout(()=>{ window.location.assign(redirectTo); }, 1200);
        } else if(res.status === 422 && result?.errors){
          // اعتبارسنجی لاراول
          Object.values(result.errors).flat().forEach((msg, i)=>{
            showToast({ type:'error', message: msg, duration: Math.min(5000+i*300, 8000) });
          });
          const firstKey = Object.keys(result.errors)[0];
          if(firstKey && form[firstKey]) form[firstKey].focus();
        } else if(res.status === 401){
          showToast({ type:'error', message: result.error || 'نام کاربری یا رمز عبور نادرست است.' });
        } else if(res.status === 429){
          showToast({ type:'warning', message: 'تلاش‌های زیاد. کمی بعد دوباره امتحان کنید.' });
        } else {
          showToast({ type:'error', message: result.error || 'خطایی در ورود رخ داد. دوباره تلاش کنید.' });
        }
      } catch(err){
        showToast({ type:'error', message:'ارتباط با سرور برقرار نشد. اتصال اینترنت یا سرور را بررسی کنید.' });
      } finally {
        setLoading(false);
      }
    });
  </script>
</body>
</html>
