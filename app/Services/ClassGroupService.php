<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface ClassGroupService{
    public function create(array $classgroup):bool|int;
    public function update(int $id,array $classgroup):bool;
    public function delete(int $id):bool;

    public function findAllByPage(int $perpage = 10): LengthAwarePaginator;

    public function findById(int $id):object|null;
    public function findAll(): array;
}