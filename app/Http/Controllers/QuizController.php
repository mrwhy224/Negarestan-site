<?php

namespace App\Http\Controllers;

use App\Models\Option;
use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class QuizController
{
    public function list()
    {
        $quizzes = Quiz::withCount(['questions', 'attempts'])->latest()->paginate(10);
        return view('panel.quiz', compact('quizzes'));
    }
    public function add()
    {
        return view('panel.quizAdd');
    }
    public function addQuestion(Quiz $quiz)
    {
        return view('panel.questionAdd', ['quiz'=>$quiz]);
    }
    public function editQuestion(Quiz $quiz, Question $question)
    {
        return view('panel.questionAdd', ['quiz'=>$quiz, 'question'=>$question]);
    }
    public function storeQuestion(Quiz $quiz, Request $request)
    {
        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'question_type' => 'required|in:single,multiple',
            'options' => 'required|array|min:2',
            'options.*.text' => 'required|string|max:255',
        ]);
        $question = Question::create([
            'quiz_id' => $quiz->id,
            'text' => $validated['question_text'],
            'type' => $validated['question_type'],
        ]);

        foreach ($validated['options'] as $option) {
            $question->options()->create([
                'text' => $option['text'],
                'is_correct' => false,
            ]);
        }

        Session::flash('success', 'سوال جدید با موفقیت ذخیره شد.');

        return redirect()->route('quiz.question', $quiz->id);
    }
    public function updateQuestion(Quiz $quiz, Request $request, Question $question)
    {
        $validated = $request->validate([
            'question_text' => 'required|string|max:255',
            'question_type' => 'required|in:single,multiple',
            'options' => 'required|array|min:2',
            'options.*.text' => 'required|string|max:255',
        ]);

        $question->update([
            'text' => $validated['question_text'],
            'type' => $validated['question_type'],
        ]);

        $question->options()->delete();
        foreach ($validated['options'] as $option) {
            $question->options()->create([
                'text' => $option['text'],
                'is_correct' => false,
            ]);
        }

        Session::flash('success', 'سوال با موفقیت به روزرسانی شد.');
        return redirect()->route('quiz.question', $quiz->id);
    }
    public function store(Request $request)
    {
        // اعتبار سنجی اطلاعات ارسالی از فرم، شامل فیلد جدید توضیحات
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string', // فیلد جدید توضیحات
        ]);
        Quiz::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);
        Session::flash('success', 'آزمون جدید با موفقیت ذخیره شد.');
        return redirect()->route('quiz.list');
    }
    public function deleteQuiz(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quiz.list');
    }

    public function question(Quiz $quiz)
    {
        $questions = $quiz->questions()->withCount('options')->paginate(10);
        return view('panel.question', compact('quiz', 'questions'));
    }
    public function deleteQuestion(Quiz $quiz, Question $question)
    {
        $question->delete();
        return redirect()->route('quiz.question', ['quiz'=>$quiz->id]);
    }

    public function option(Quiz $quiz, Question $question)
    {
        $options = $question->options()->paginate(10);
        return view('panel.option', compact('quiz', 'question', 'options'));
    }
    public function deleteOption(Quiz $quiz, Question $question, Option $option)
    {
        $option->delete();
        return redirect()->route('quiz.option', ['quiz'=>$quiz->id, 'question'=>$question]);
    }
}
