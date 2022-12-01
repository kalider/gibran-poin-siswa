<?php

namespace App\Services;

use Illuminate\Pagination\LengthAwarePaginator;

interface MajorService{
    public function create(array $major): bool|int;
    public function update(int $id,array $major): bool;
    public function delete(int $id): bool;

    public function findAllbyPage(int $perpage = 10):LengthAwarePaginator;
    public function findById(int $id):object|null;
    public function findAll(): array;

}