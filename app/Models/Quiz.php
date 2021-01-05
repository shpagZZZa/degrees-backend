<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    public function answers()
    {
        return $this->belongsToMany(Answer::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    protected $fillable = [
        'title', 'subtitle'
    ];

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function setSubTitle(string $subTitle): self
    {
        $this->subTitle = $subTitle;
        return $this;
    }

    public function setUserId(int $userId): self
    {
        $this->user_id = $userId;
        return $this;
    }
}
