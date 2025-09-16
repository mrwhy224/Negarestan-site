<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['quiz_id', 'text', 'type'];

    /**
     * A question belongs to a quiz.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    /**
     * A question has many options.
     */
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
