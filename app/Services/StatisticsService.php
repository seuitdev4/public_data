<?php

namespace App\Services;

use App\Repositories\Interfaces\StatisticsRepositoryInterface;
use App\Services\Interfaces\StatisticsServiceInterface;

class StatisticsService extends BaseService implements StatisticsServiceInterface
{
    public function __construct(StatisticsRepositoryInterface $statisticsRepository)
    {
        parent::__construct($statisticsRepository);
    }

    public function getStudentStatisticsReport(array $filters)
    {
        return $this->repository->getStudentStatisticsReport($filters);
    }

    public function getGraduatedStatisticsReport(array $filters)
    {
        return $this->repository->getGraduatedStatisticsReport($filters);
    }
}
