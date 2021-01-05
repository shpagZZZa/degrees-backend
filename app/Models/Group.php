<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function headEmployee()
    {
        return $this->hasOne(Employee::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    protected $fillable = [
        'head_id', 'parent_id', 'title'
    ];

    public function setHeadId(int $headId): self
    {
        $this->head_id = $headId;
        return $this;
    }

    public function setParentId(int $parentId): self
    {
        $this->parent_id = $parentId;
        return $this;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
}
