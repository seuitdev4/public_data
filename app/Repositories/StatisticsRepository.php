<?php

namespace App\Repositories;

use App\Models\StudentReportPerDepartment;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Interfaces\StatisticsRepositoryInterface;

class StatisticsRepository extends BaseRepository implements StatisticsRepositoryInterface
{
    protected Model $model;

    public function __construct(StudentReportPerDepartment $model)
    {
        parent::__construct($model);
    }

    public function getStudentStatisticsReport(array $filters)
    {
        if (!empty($filters)) {
            foreach ($filters as $key => $value) {
                $this->model->with('faculty');
                if (is_array($value)) {
                    $this->model->where($key, 'in', $value);
                } else {
                    $this->model->where($key, $value);
                }
            }
        }
        return $this->model->get();
    }
}
