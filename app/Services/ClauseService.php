<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface ClauseService {
    public function create(array $clause): bool|int;
    public function update(int $id, array $clause): bool;
    public function delete(int $id): bool;

    public function findAllByPage(int $perpage = 10): LengthAwarePaginator;
    public function findById(int $id): object|null;
    public function findByAll():array;
}
