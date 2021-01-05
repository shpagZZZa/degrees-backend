<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'mark', 'comment', 'employee_id'
    ];

    /**
     * @param int $mark
     * @return $this
     */
    public function setMark(int $mark): self
    {
        $this->mark = $mark;
        return $this;
    }

    /**
     * @param string $comment
     * @return $this
     */
    public function setComment(string $comment): self
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setEmployeeId(int $id): self
    {
        $this->employee_id = $id;
        return $this;
    }
}
