<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;

class UserQuizController
{
    public function index(Quiz $quiz)
    {
        if (!Auth::check())
            return redirect()->route('register', ['redirect_to' => url()->current()]);
        $quiz->load(['questions.options']);
        dd([
            'Quiz Attributes' => $quiz->getAttributes(), // نام ستون‌های کوییز را نشان می‌دهد
            'First Question' => $quiz->questions->first(), // اولین سوال را (اگر باشد) نشان می‌دهد
            'Raw Relations' => $quiz->relations,
        ]);

        $quizData = [
            'title' => $quiz->title,
            'questions' => $quiz->questions->map(function ($question) {
                return [
                    'id' => $question->id,
                    'type' => $question->type,
                    'question' => $question->title,
                    'options' => $question->options->pluck('text')->toArray(),
                ];
            })->toArray()
        ];
        return view('quiz', [
            'quiz' => $quiz,
            'quizData' => $quizData
        ]);
    }
}
