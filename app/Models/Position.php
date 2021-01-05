<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'title'
    ];

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
}
