<?php

namespace App\Services\Races;

use App\Repositories\Races\RaceRepository;
use App\Models\Race;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RaceService
{
    protected $repo;

    public function __construct(RaceRepository $repo)
    {
        $this->repo = $repo;
    }

    public function list(int $perPage = 15, $status = null): LengthAwarePaginator
    {
        return $this->repo->all($perPage, $status);
    }

    public function get(int $id): ?Race
    {
        return $this->repo->find($id);
    }

    public function create(array $data): Race
    {
        return $this->repo->create($data);
    }

    public function update(int $id, array $data): ?Race
    {
        return $this->repo->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->repo->delete($id);
    }
}
