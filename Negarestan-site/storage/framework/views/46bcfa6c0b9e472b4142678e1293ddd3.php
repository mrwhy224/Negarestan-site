<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>آزمون آنلاین - آموزشگاه آینده</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&family=Vazirmatn:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            scroll-behavior: smooth;
            overflow-x: hidden;
            background-color: #f8fafc;
            background-image: radial-gradient(circle at 1px 1px, #e2e8f0 1px, transparent 0);
            background-size: 20px 20px;
        }
        h1, h2, h3, .fantasy-font {
            font-family: 'Lalezar', cursive;
        }
        /* استایل سفارشی برای چک‌باکس و دکمه رادیویی */
        .form-checkbox, .form-radio {
            color: #0891b2; /* cyan-600 */
        }
        .form-checkbox:checked, .form-radio:checked {
            background-color: #0891b2;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Header Navigation -->
    <header class="bg-white/80 backdrop-blur-sm shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex items-center justify-center">
            <a href="<?php echo e(route('home')); ?>">
                <img src="/logo.png" alt="logo" width="90">
            </a>

        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow flex items-center justify-center py-12">
        <section id="quiz" class="container mx-auto px-6">
            <div class="max-w-3xl mx-auto">
                <div id="quiz-wrapper" class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <div class="p-8">
                        <h2 id="quiz-title" class="text-3xl font-bold text-center text-cyan-800 mb-2"></h2>
                        <p class="text-center text-gray-500 mb-8">لطفا به سوالات زیر پاسخ دهید.</p>

                        <!-- Progress Bar -->
                        <div class="w-full bg-gray-200 rounded-full h-2.5 mb-8">
                            <div id="progress-bar" class="bg-cyan-600 h-2.5 rounded-full transition-all duration-500" style="width: 0%"></div>
                        </div>

                        <!-- Quiz Content -->
                        <div id="quiz-content" class="min-h-[250px]">
                            <!-- Question will be injected here -->
                        </div>

                        <!-- Navigation -->
                        <div id="quiz-navigation" class="flex justify-between items-center mt-8">
                            <button id="next-btn" class="bg-cyan-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-cyan-700 transition">بعدی</button>
                            <button id="submit-btn" class="bg-green-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-green-700 transition hidden">ارسال نتایج</button>
                            <button id="prev-btn" class="bg-gray-300 text-gray-700 font-bold py-2 px-6 rounded-lg hover:bg-gray-400 transition disabled:opacity-50 disabled:cursor-not-allowed">قبلی</button>
                        </div>
                    </div>
                </div>
                <!-- Thank You Message -->
                <div id="thank-you-message" class="bg-white rounded-2xl shadow-2xl p-12 text-center hidden">
                    <i class="fas fa-check-circle text-6xl text-green-500 mb-4"></i>
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">متشکریم!</h2>
                    <p class="text-lg text-gray-600">پاسخ‌های شما با موفقیت ثبت شد.</p>
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const quizTitle = document.getElementById('quiz-title');
            const quizContent = document.getElementById('quiz-content');
            const progressBar = document.getElementById('progress-bar');
            const prevBtn = document.getElementById('prev-btn');
            const nextBtn = document.getElementById('next-btn');
            const submitBtn = document.getElementById('submit-btn');
            const thankYouMessage = document.getElementById('thank-you-message');
            const quizWrapper = document.getElementById('quiz-wrapper');

            const quizData = {
                title: "آزمون تعیین سطح ادبیات",
                questions: [
                    {
                        type: 'single',
                        question: "کدام یک از آثار زیر متعلق به فردوسی است؟",
                        options: ["گلستان", "شاهنامه", "بوستان", "مثنوی معنوی"],
                    },
                    {
                        type: 'single',
                        question: "معنی واژه «بحت» کدام است؟",
                        options: ["شانس", "یقین", "شک", "هرگز"],
                    },
                    {
                        type: 'multiple',
                        question: "کدام یک از موارد زیر از آرایه‌های ادبی هستند؟ (چند گزینه را انتخاب کنید)",
                        options: ["تشبیه", "ضرب‌المثل", "کنایه", "استعاره"],
                    },
                    {
                        type: 'single',
                        question: "کدام شاعر به «شاعر آینه‌ها» معروف است؟",
                        options: ["سهراب سپهری", "فروغ فرخزاد", "احمد شاملو", "مهدی اخوان ثالث"],
                    },
                ]
            };

            let currentQuestionIndex = 0;
            const userAnswers = quizData.questions.map(q => q.type === 'multiple' ? [] : null);

            function renderQuestion() {
                const questionData = quizData.questions[currentQuestionIndex];
                let optionsHTML = '';

                questionData.options.forEach((option) => {
                    const inputType = questionData.type === 'multiple' ? 'checkbox' : 'radio';
                    const inputClass = questionData.type === 'multiple' ? 'form-checkbox' : 'form-radio';
                    let isChecked = '';
                    if (questionData.type === 'multiple') {
                        isChecked = userAnswers[currentQuestionIndex].includes(option) ? 'checked' : '';
                    } else {
                        isChecked = userAnswers[currentQuestionIndex] === option ? 'checked' : '';
                    }

                    optionsHTML += `
                        <label class="flex items-center p-4 border rounded-lg cursor-pointer hover:bg-cyan-50 transition has-[:checked]:bg-cyan-100 has-[:checked]:border-cyan-500">
                            <input type="${inputType}" name="question-${currentQuestionIndex}" value="${option}" class="ml-3 ${inputClass} text-cyan-600 focus:ring-cyan-500" ${isChecked}>
                            <span class="text-lg text-gray-700">${option}</span>
                        </label>
                    `;
                });

                quizContent.innerHTML = `
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">${currentQuestionIndex + 1}. ${questionData.question}</h3>
                    <div class="space-y-4">
                        ${optionsHTML}
                    </div>
                `;

                const inputElements = quizContent.querySelectorAll(`input[name="question-${currentQuestionIndex}"]`);
                inputElements.forEach(input => {
                    input.addEventListener('change', (e) => {
                        if (questionData.type === 'multiple') {
                            if (e.target.checked) {
                                userAnswers[currentQuestionIndex].push(e.target.value);
                            } else {
                                const index = userAnswers[currentQuestionIndex].indexOf(e.target.value);
                                if (index > -1) {
                                    userAnswers[currentQuestionIndex].splice(index, 1);
                                }
                            }
                        } else { // single choice
                            userAnswers[currentQuestionIndex] = e.target.value;
                        }
                    });
                });

                updateProgressBar();
                updateNavigation();
            }

            function updateProgressBar() {
                const progress = ((currentQuestionIndex) / quizData.questions.length) * 100;
                progressBar.style.width = `${progress}%`;
            }

            function updateNavigation() {
                prevBtn.disabled = currentQuestionIndex === 0;

                if (currentQuestionIndex === quizData.questions.length - 1) {
                    nextBtn.classList.add('hidden');
                    submitBtn.classList.remove('hidden');
                } else {
                    nextBtn.classList.remove('hidden');
                    submitBtn.classList.add('hidden');
                }
            }

            nextBtn.addEventListener('click', () => {
                if (currentQuestionIndex < quizData.questions.length - 1) {
                    currentQuestionIndex++;
                    renderQuestion();
                }
            });

            prevBtn.addEventListener('click', () => {
                if (currentQuestionIndex > 0) {
                    currentQuestionIndex--;
                    renderQuestion();
                }
            });

            submitBtn.addEventListener('click', () => {
                // Update progress bar to 100% on submit
                progressBar.style.width = `100%`;

                // Show thank you message after a short delay
                setTimeout(() => {
                    quizWrapper.classList.add('hidden');
                    thankYouMessage.classList.remove('hidden');
                }, 500);

                console.log("User Answers:", userAnswers);
            });

            quizTitle.textContent = quizData.title;
            renderQuestion();
        });
    </script>
</body>
</html>

<?php /**PATH D:\programming projects\laravel\negarestan\resources\views/quiz.blade.php ENDPATH**/ ?>