<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    /**
     * ستون‌هایی که می‌توانند به صورت انبوه پر شوند (Mass Assignable).
     */
    protected $fillable = [
        'post_id',
        'author_name',
        'author_email',
        'body',
        'status',
    ];

    /**
     * ارتباط با مدل Post (هر نظر به یک پست تعلق دارد).
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
