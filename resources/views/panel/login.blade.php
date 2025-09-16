<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود به حساب کاربری - آموزشگاه آینده</title>
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

    <div class="flex flex-col md:flex-row w-full max-w-4xl  bg-white shadow-2xl rounded-2xl overflow-hidden m-8">
        
        <!-- Form Section -->
        <div class="w-full md:w-1/2 p-8 md:p-12 flex flex-col justify-center">
            <div class="text-center mb-8">
                <img src="/logo.png" alt="Logo" class="w-[15rem] mx-auto mb-4 p-2 rounded-lg">
                <h1 class="text-3xl font-bold text-[var(--brand-blue)] fantasy-font">ورود به حساب کاربری</h1>
                <p class="text-gray-500 mt-2">خوشحالیم که دوباره شما را می‌بینیم!</p>
            </div>

            <form action="#" class="space-y-6">
                <div>
                    <label for="email" class="block text-sm font-bold text-gray-700 mb-2">ایمیل یا نام کاربری</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-user text-gray-400"></i>
                        </span>
                        <input type="email" id="email" name="email" placeholder="ایمیل خود را وارد کنید" class="form-input w-full pr-10 pl-3 py-3 bg-gray-100 border-2 border-transparent rounded-lg transition duration-300 focus:outline-none focus:bg-white" required>
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-bold text-gray-700 mb-2">رمز عبور</label>
                     <div class="relative">
                        <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <i class="fas fa-lock text-gray-400"></i>
                        </span>
                        <input type="password" id="password" name="password" placeholder="رمز عبور خود را وارد کنید" class="form-input w-full pr-10 pl-3 py-3 bg-gray-100 border-2 border-transparent rounded-lg transition duration-300 focus:outline-none focus:bg-white" required>
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember" name="remember" class="h-4 w-4 text-[var(--brand-gold)] focus:ring-[var(--brand-gold)] border-gray-300 rounded">
                        <label for="remember" class="mr-2 text-gray-600">مرا به خاطر بسپار</label>
                    </div>
                    <a href="#" class="font-semibold text-gray-500 hover:text-[var(--brand-blue)] transition">فراموشی رمز عبور</a>
                </div>

                <div>
                    <button type="submit" class="w-full bg-[var(--brand-gold)] text-white font-bold py-3 px-4 rounded-lg hover:brightness-110 transition duration-300 shadow-lg text-lg">
                        ورود
                    </button>
                </div>
            </form>

            <p class="text-center text-sm text-gray-500 mt-8">
                حساب کاربری ندارید؟
                <a href="#" class="font-bold text-[var(--brand-blue)] hover:underline">ثبت نام کنید</a>
            </p>
        </div>

        <!-- Image Section -->
        <div class="hidden md:flex w-1/2 bg-[var(--brand-blue)] items-center justify-center p-12 text-white text-center flex-col rounded-l-2xl">
            <h2 class="text-4xl font-bold fantasy-font leading-tight">آموزشگاه آینده</h2>
            <p class="mt-4 text-lg text-gray-300 max-w-sm">مسیر موفقیت تحصیلی شما از اینجا آغاز می‌شود. با ما همراه باشید.</p>
            <div class="w-40 h-1 bg-[var(--brand-gold)] rounded-full my-8"></div>
        </div>

    </div>

</body>
</html>
