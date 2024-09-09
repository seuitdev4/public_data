<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListGraduatedStudentReportRequest extends FormRequest
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
            'faculty_id' => 'array|nullable|sometimes',
            'faculty_id.*' => 'exists:faculties,id',

            'gender' => 'array|nullable|sometimes',
            'gender.*' => 'in:male,female',

            'is_saudi' => 'array|nullable|sometimes',
            'is_saudi.*' => 'in:1,0',

            'year_id' => 'array|nullable|sometimes',
            'year_id.*' => 'exists:study_years,id',
        ];
    }
}
