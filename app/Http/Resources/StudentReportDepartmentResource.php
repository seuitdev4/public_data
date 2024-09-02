<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentReportDepartmentResource extends JsonResource
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
            'level' => $this->level->title,
            'count' => $this->count,
            'faculty_department' => $this->facultyDepartment->title,
            'faculty' => $this->faculty->title,
            'year' => $this->year->title,
            'term' => $this->term->title,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
