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

    public function setFullName(string $fullName): self
    {
        $this->full_name = $fullName;
        return $this;
    }

    public function setAccessCode(string $accessCode): self
    {
        $this->accessCode = $accessCode;
        return $this;
    }

    public function setPositionId(int $positionId): self
    {
        $this->position_id = $positionId;
    }
}
