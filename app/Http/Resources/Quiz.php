<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Quiz extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'feedbacks' => new FeedbackCollection($this->feedbacks),
            'employee' => new Employee($this->employee),
            'answers' => new AnswerCollection($this->answers),
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'createdAt' => $this->created_at
        ];
    }
}
