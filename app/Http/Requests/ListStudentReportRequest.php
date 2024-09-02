<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListStudentReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_level' => 'array|nullable|sometimes',
            'student_level.*' => 'exists:levels,id',
            'faculty_id' => 'array|nullable|sometimes',
            'faculty_id.*' => 'exists:faculties,id',
            'gender' => 'array|nullable|sometimes',
            'gender.*' => 'in:male,female',
            'study_term_id' => 'array|nullable|sometimes',
            'study_term_id.*' => 'exists:study_terms,id',
        ];
    }
}
