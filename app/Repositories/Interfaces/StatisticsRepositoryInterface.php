<?php

namespace App\Repositories\Interfaces;

interface StatisticsRepositoryInterface extends BaseRepositoryInterface
{
    public function getStudentStatisticsReport(array $filters);
    public function getGraduatedStatisticsReport(array $filters);
}
