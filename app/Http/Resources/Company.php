<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class Company extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        /** @var Collection $groups */
        $groups = $this->groups;
        return [
            'id' => $this->id,
            'title' => $this->title,
            'groups' => new GroupCollection($this->groups, GroupExtended::class)
        ];
    }
}
