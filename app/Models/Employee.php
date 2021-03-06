<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name', 'position_id', 'access_code'
    ];

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class, 'employee_id');
    }

    public function setGroupId(int $id): self
    {
        $this->group_id = $id;
        return $this;
    }

    public function setAdmin(): self
    {
        $this->is_admin = $this->is_admin === 1 ? 0 : 1;
        return $this;
    }

    public function setFullName(string $fullName): self
    {
        $this->full_name = $fullName;
        return $this;
    }

    public function setAccessCode(string $accessCode): self
    {
        $this->access_code = $accessCode;
        return $this;
    }

    public function setPositionId(int $positionId): self
    {
        $this->position_id = $positionId;
        return $this;
    }

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }
}
