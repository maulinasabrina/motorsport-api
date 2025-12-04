<?php

namespace App\Http\Controllers\Api\Drivers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request\Drivers\StoreDriverRequest;
use Illuminate\Http\Request\Drivers\UpdateDriverRequest;
use App\Services\Drivers\DriverService;
use Illuminate\Http\JsonResponse;

class DriverController extends Controller
{
    protected $service;

    public function __construct(DriverService $service)
    {
        $this->service = $service;
    }

    // GET /api/drivers
    public function index(): JsonResponse
    {
        $drivers = $this->service->getAllDrivers(15);
        return response()->json([
            'success' => true,
            'data' => $drivers,
        ]);
    }

    // GET /api/drivers/{id}
    public function show(int $id): JsonResponse
    {
        $driver = $this->service->getDriverById($id);
        if (!$driver) {
            return response()->json([
                'success' => false,
                'message' => 'Driver not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $driver,
        ]);
    }

    // POST /api/drivers
    public function store(StoreDriverRequest $request): JsonResponse    
    {
        $driver = $this->service->createDriver($request->validated());

        return response()->json([
            'success' => true,
            'data' => $driver,
        ], 201);
    }   

    // PUT /api/drivers/{id}
    public function update(UpdateDriverRequest $request, int $id): JsonResponse
    {
        $driver = $this->service->updateDriver($id, $request->validated());
        if (!$driver) {
            return response()->json([
                'success' => false,
                'message' => 'Driver not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $driver,
        ]);
    }       
    // DELETE /api/drivers/{id}
    public function destroy(int $id): JsonResponse
    {   
        $deleted = $this->service->deleteDriver($id);
        if (!$deleted) {
            return response()->json([
                'success' => false,
                'message' => 'Driver not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Driver deleted successfully',
        ]);
    }
}