<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'subtitle'
    ];

    /**
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $subTitle
     * @return $this
     */
    public function setSubTitle(string $subTitle): self
    {
        $this->subTitle = $subTitle;
        return $this;
    }
}
