<?php 
namespace App\Services\Drivers;

use App\Models\Driver;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Drivers\DriverRepository;

class DriverService
{
    protected $repository;

    public function __construct(DriverRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllDrivers(int $perPage = 15): LengthAwarePaginator
    {
        return $this->repository->all($perPage);
    }

    public function getDriverById(int $id): ?Driver
    {
        return $this->repository->find($id);
    }

    public function createDriver(array $data): Driver
    {
        return $this->repository->create($data);
    }

    public function updateDriver(int $id, array $data): ?Driver
    {
        return $this->repository->update($id, $data);
    }

    public function deleteDriver(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
?>