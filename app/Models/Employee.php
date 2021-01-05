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
