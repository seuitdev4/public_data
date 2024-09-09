<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class GraduatedStudentReportCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public $collects = GraduatedStudentResource::class;

    public function with($request)
    {
        return [
            'meta' => [
                'total_student_count' => $this->collection->sum('count'),
            ],
        ];
    }

}
