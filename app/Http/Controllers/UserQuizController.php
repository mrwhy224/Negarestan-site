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

    public function submit(Quiz $quiz)
    {

    }
}
