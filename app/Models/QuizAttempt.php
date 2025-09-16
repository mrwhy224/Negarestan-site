<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuizAttempt extends Model
{
    protected $fillable = ['user_id', 'quiz_id', 'score'];

    /**
     * An attempt belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An attempt belongs to a quiz.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * An attempt has many answers.
     */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
