<?php

namespace App\Repositories\Races;

use App\Models\Race;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RaceRepository
{
    protected $model;

    public function __construct(Race $race)
    {
        $this->model = $race;
    }

    public function all(int $perPage = 15, $status = null): LengthAwarePaginator
    {
        $query = $this->model->orderBy('date', 'asc');

        if ($status === 'upcoming') {
            $query->where('date', '>=', now());
        } elseif ($status === 'completed') {
            $query->where('date', '<', now());
        }

        return $query->paginate($perPage);
    }

    public function find(int $id): ?Race
    {
        return $this->model->find($id);
    }

    public function create(array $data): Race
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): ?Race
    {
        $race = $this->find($id);
        if (!$race) return null;
        $race->update($data);
        return $race;
    }

    public function delete(int $id): bool
    {
        $race = $this->find($id);
        if (!$race) return false;
        return (bool) $race->delete();
    }
}
