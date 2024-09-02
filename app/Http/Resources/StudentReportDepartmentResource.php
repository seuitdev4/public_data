<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentReportDepartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'gender' => $this->gender,
            'student_level' => $this->student_level,
            'count' => $this->count,
            'faculty_department_id' => $this->faculty_department_id,
            'faculty_id' => $this->faculty_id,
            'study_year_id' => $this->study_year_id,
            'study_term_id' => $this->study_term_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

   
}
