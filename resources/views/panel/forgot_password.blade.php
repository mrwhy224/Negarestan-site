<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فراموشی رمز عبور - آموزشگاه آینده</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --brand-gold: #f5b301;
            --brand-blue: #1c3d5a;
        }
        body {
            font-family: 'Vazirmatn', sans-serif;
            background-color: #f0f2f5;
            background-image:
                radial-gradient(circle at 1px 1px, #d1d5db 1px, transparent 0);
            background-size: 25px 25px;
        }
        .fantasy-font {
            font-family: 'Lalezar', cursive;
        }
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

    <div class="flex flex-col md:flex-row w-full max-w-4xl bg-white shadow-2xl rounded-2xl overflow-hidden m-8">
        
        <!-- Form Section -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}"><img src="/logo.png" alt="Logo" class="w-[15rem] mx-auto mb-4 p-2 rounded-lg"></a>
                <h1 class="text-3xl font-bold text-[var(--brand-blue)] fantasy-font">فراموشی رمز عبور</h1>
                <p class="text-gray-500 mt-2">شماره تلفن خود را وارد کنید تا کد تأیید برای شما ارسال شود.</p>
            </div>

            <form action="#" class="space-y-6">
                <div>
                    <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">شماره تلفن</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-phone text-gray-400"></i>
                        </span>
                        <input type="tel" id="phone" name="phone" placeholder="مثال: 09121234567" class="form-input w-full pr-10 pl-3 py-3 bg-gray-100 border-2 border-transparent rounded-lg transition duration-300 focus:outline-none focus:bg-white" required>
                    </div>
                </div>
                
                <div>
                    <button type="submit" class="w-full bg-[var(--brand-gold)] text-white font-bold py-3 px-4 rounded-lg hover:brightness-110 transition duration-300 shadow-lg text-lg">
                        ارسال کد تأیید
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-500 mt-8">
                رمز عبور خود را به خاطر آوردید؟
                <a href="{{ route('login') }}" class="font-bold text-[var(--brand-blue)] hover:underline">ورود به حساب کاربری</a>
            </p>
        </div>

        <!-- Image Section -->
        <div class="hidden md:flex w-1/2 bg-[var(--brand-blue)] items-center justify-center p-12 text-white text-center flex-col rounded-l-2xl">
            <h2 class="text-4xl font-bold fantasy-font brand-gradient-text mb-4">بهترین انتخاب برای آینده</h2>
            <p class="mt-4 text-lg text-gray-300 max-w-sm">نگران نباشید! ما به شما کمک می‌کنیم تا حساب کاربری خود را بازیابی کنید.</p>
            <div class="w-40 h-1 bg-[var(--brand-gold)] rounded-full my-8"></div>
        </div>

    </div>

</body>
</html>
