<?php

namespace App\Http\Controllers;

use App\Services\ClassGroupService;
use App\Services\PointReportService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PointReportController extends Controller
{
    private PointReportService $pointReportService;
    private ClassGroupService $classGroupService;

    public function __construct(PointReportService $pointReportService, ClassGroupService $classGroupService)
    {
        $this->pointReportService = $pointReportService;
        $this->classGroupService = $classGroupService;
    }

    public function perStudent(Request $request): Response
    {
        $classId = $request->input('class_id');
        $name = $request->input('name');

        $report = $this->pointReportService->pointStudentByFilter(['class_id' => $classId, 'name' => $name]);
        $classGroups = $this->classGroupService->findAll();
        
        return response()->view('report.per_student', [
            'title' => 'Laporan Poin',
            'report' => $report,
            'class_groups' => $classGroups
        ]);
    }
}
