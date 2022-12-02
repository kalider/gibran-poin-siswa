<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface PointReportService {
    public function pointStudentByFilter(array $filters): LengthAwarePaginator;
}