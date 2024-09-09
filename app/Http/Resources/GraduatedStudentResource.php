<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GraduatedStudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'gender' => $this->gender,
            'is_saudi' => $this->is_saudi ? true : false,
            'count' => $this->count,
            'faculty' => $this->faculty->title,
            'year' => $this->year->title,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
