<?php

namespace App\Services\Interfaces;

use App\Services\Interfaces\BaseServiceInterface;

interface StatisticsServiceInterface extends BaseServiceInterface
{
    public function getStudentStatisticsReport(array $filters);
}
