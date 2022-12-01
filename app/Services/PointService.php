<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface PointService {
    public function create(array $point): bool|int;
    public function update(int $id, array $point): bool;
    public function delete(int $id): bool;

    public function findAllByPage(int $perpage = 10): LengthAwarePaginator;
    public function findById(int $id): object|null;
    public function findAll(): array;
}
