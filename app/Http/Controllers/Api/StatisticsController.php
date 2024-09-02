<?php

namespace App\Http\Controllers\Api;
use App\Http\Resources\StudentReportDepartmentCollection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListStudentReportRequest;
use App\Services\Interfaces\StatisticsServiceInterface;



class StatisticsController extends Controller
{
    protected StatisticsServiceInterface $statisticsService;

    public function __construct(StatisticsServiceInterface $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }
    public function getStatistics(ListStudentReportRequest $request)
    {
        // Validate request parameters
        $filters = $request->validated();
        // Call the service to get the filtered data
        $data = $this->statisticsService->getStudentStatisticsReport($filters);

        return  new StudentReportDepartmentCollection($data);
    }
}
