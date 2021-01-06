<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }

    protected $fillable = [
        'title'
    ];

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
}
