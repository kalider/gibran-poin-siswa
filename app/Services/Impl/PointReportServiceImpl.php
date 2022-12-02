<?php

namespace App\Services\Impl;

use App\Services\PointReportService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PointReportServiceImpl implements PointReportService
{
    public function pointStudentByFilter(array $filters): LengthAwarePaginator
    {
        $pointTotalQuery = DB::table('points')
            ->select('points.student_id', DB::raw('SUM(clauses.clause_score) AS total'))
            ->leftJoin('clauses', 'clauses.id', '=', 'points.clause_id')
            ->groupBy('points.student_id');

        $data = DB::table('students')
            ->leftJoin('classgroups', 'classgroups.id', '=', 'students.class_id')
            ->joinSub($pointTotalQuery, 'point', 'students.id', '=', 'point.student_id')
            ->orderBy('point.total', 'asc')
            ->select("students.*", "classgroups.class_name AS class", "point.total");

        if (!empty($filters['class_id'])) $data->where('students.class_id', '=', $filters['class_id']);
        if (!empty($filters['name'])) $data->where('students.name', 'LIKE', "%{$filters['name']}%");
        
        return $data->paginate();
    }
}