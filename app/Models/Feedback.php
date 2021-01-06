<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feedback extends Model
{
    use HasFactory;

    public function answer(): BelongsTo
    {
        return $this->belongsTo(Answer::class);
    }

    public function quiz(): BelongsTo
    {
        return $this->belongsTo(Quiz::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    protected $fillable = [
        'answer_id', 'comment', 'employee_id', 'quiz_id'
    ];

    public function setQuizId(int $id): self
    {
        $this->quiz_id = $id;
        return $this;
    }

    public function setAnswerId(int $mark): self
    {
        $this->answer_id = $mark;
        return $this;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    public function setEmployeeId(int $id): self
    {
        $this->employee_id = $id;
        return $this;
    }
}
