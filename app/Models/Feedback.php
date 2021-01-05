<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    public function answer()
    {
        return $this->belongsTo(Answer::class);
    }

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function author()
    {
        return $this->belongsTo(Employee::class);
    }

    protected $fillable = [
        'mark', 'comment', 'employee_id'
    ];

    public function setMark(int $mark): self
    {
        $this->mark = $mark;
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
