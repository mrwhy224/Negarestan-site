<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Option;
use App\Models\Quiz;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserQuizController
{
    public function index(Quiz $quiz)
    {
        if (!Auth::check())
            return redirect()->route('register', ['redirect_to' => url()->current()]);
        $quiz->load(['questions.options']);


        $quizData = [
            'title' => $quiz->title,
            'questions' => $quiz->questions->map(function ($question) {
                return [
                    'id' => $question->id,
                    'type' => $question->type,
                    'question' => $question->text,
                    'options' => $question->options->pluck('text')->toArray(),
                ];
            })->toArray()
        ];
        return view('quiz', [
            'quiz' => $quiz,
            'quizData' => $quizData
        ]);
    }

    public function submit(Request $request, Quiz $quiz)
    {
        // ۱. اعتبارسنجی اولیه
        $request->validate([
            'answers' => 'required|array',
            'answers.*.question_id' => 'required|exists:questions,id',
        ]);

        try {
            DB::beginTransaction();

            $attempt = QuizAttempt::create([
                'user_id' => Auth::id(),
                'quiz_id' => $quiz->id,
            ]);

            foreach ($request->answers as $answerData) {
                $questionId = $answerData['question_id'];
                $selectedOptions = $answerData['selected_options'];

                // اگر کاربر پاسخی نداده رد شو
                if (empty($selectedOptions)) {
                    continue;
                }

                // تبدیل پاسخ به آرایه (برای اینکه هم تک‌گزینه و هم چندگزینه را با یک منطق حل کنیم)
                $choices = is_array($selectedOptions) ? $selectedOptions : [$selectedOptions];

                foreach ($choices as $choiceText) {
                    // ۵. پیدا کردن ID گزینه بر اساس متن و سوال
                    // چون فرانت متن می‌فرستد، باید ID را پیدا کنیم
                    $option = Option::where('question_id', $questionId)
                        ->where('text', $choiceText) // فرض: نام ستون متن گزینه text است
                        ->first();

                    if ($option) {
                        // ۶. ذخیره در جدول answers
                        Answer::create([
                            'quiz_attempt_id' => $attempt->id,
                            'question_id' => $questionId,
                            'option_id' => $option->id,
                        ]);
                    }
                }
            }
            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'نتایج با موفقیت ثبت شد.',
                'attempt_id' => $attempt->id
            ], 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'status' => 'error',
                'message' => 'خطایی در ثبت آزمون رخ داد.',
                'debug' => $e->getMessage() // در محیط پروداکشن این خط را پاک کنید
            ], 500);
        }
    }
}
