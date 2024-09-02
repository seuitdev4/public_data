<?php

namespace App\Services\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface BaseServiceInterface
{
    public function create(array $data): ?Model;

    public function listAll(array $requestOptions = []);

    public function list(array $requestOptions = []);

    public function getById(int $id): Model;

    public function findById(int $id): ?Model;
}
