<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Employee extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'fullName' => $this->full_name,
            'position' => new Position($this->position),
            'group' => new Group($this->group),
            'isAdmin' => $this->is_admin
        ];
    }
}
