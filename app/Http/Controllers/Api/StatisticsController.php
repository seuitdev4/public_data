<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller;
use App\Http\Requests\ListStudentReportRequest;
use App\Http\Resources\StudentReportDepartmentResource;
use App\Services\Interfaces\StatisticsServiceInterface;



class StatisticsController extends Controller
{
    protected StatisticsServiceInterface $statisticsService;

    public function __construct(StatisticsServiceInterface $statisticsService)
    {
        $this->statisticsService = $statisticsService;
    }

    public function index(ListStudentReportRequest $request)
    {

        $filters = $request->validated();
        $data = $this->statisticsService->getStudentStatisticsReport($filters);

        return StudentReportDepartmentResource::collection($data);
    }


    public function getStatistics(Request $request)
    {
 
        // Validate request parameters
        $validated = $request->validate([
            'faculties' => 'array|nullable',
            'levels' => 'array|nullable',
            'genders' => 'array|nullable',
            'semesters' => 'array|nullable',
        ]);
    
        // Call the service to get the filtered data
        $data = $this->statisticsService->getStudentStatisticsReport($validated);

      

        return response()->json(['data' => $data]);
    }
}
