<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $fillable = ['title', 'description'];

    /**
     * A quiz has many questions.
     */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * A quiz can be attempted by many users.
     */
    public function attempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }
}
