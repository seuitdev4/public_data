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
            $query =  $this->model->with('faculty');
            foreach ($filters as $key => $value) {
                if (is_array($value)) {
                    $query->whereIn($key, $value);
                } else {
                    $query->where($key, $value);
                }
            }
        }

        return $query->get();
    }
}
