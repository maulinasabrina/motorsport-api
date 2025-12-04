<?php 

namespace App\Repositories\Drivers;

use App\Models\Driver;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DriverRepository
{
    protected $model;

    public function __construct(Driver $model)
    {
        $this->model = $model;
    }

    public function paginate(int $perPage = 15): LengthAwarePaginator
    {
        return $this->model->paginate($perPage);
    }

    public function all(int $perPage = 15): LengthAwarePaginator
    {
        // pagination & sorting 
        return $this->model->orderBy('name')->paginate($perPage);
    }

    public function find(int $id): ?Driver
    {
        return $this->model->find($id);
    }

    public function create(array $data): Driver
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Driver
    {
        $driver = $this->find($id);
        if (!$driver) return null;
        $driver->update($data);
        return $driver;
    }

    public function delete(int $id): bool
    {
        $driver = $this->find($id);
        if (!$driver) return false;
        return $driver->delete();
    }

    
}   
