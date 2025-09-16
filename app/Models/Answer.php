<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['quiz_attempt_id', 'question_id', 'option_id'];

    /**
     * An answer belongs to a quiz attempt.
     */
    public function quizAttempt()
    {
        return $this->belongsTo(QuizAttempt::class);
    }

    /**
     * An answer belongs to a question.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * An answer belongs to an option.
     */
    public function option()
    {
        return $this->belongsTo(Option::class);
    }
}
