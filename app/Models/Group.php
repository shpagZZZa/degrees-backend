<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'head_id', 'parent_id', 'title'
    ];

    /**
     * @param int $headId
     * @return $this
     */
    public function setHeadId(int $headId): self
    {
        $this->head_id = $headId;
        return $this;
    }

    /**
     * @param int $parentId
     * @return $this
     */
    public function setParentId(int $parentId): self
    {
        $this->parent_id = $parentId;
        return $this;
    }

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
}
