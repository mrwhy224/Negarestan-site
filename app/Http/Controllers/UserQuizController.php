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
        return view('quiz', ['quiz'=>$quiz]);
    }
}
