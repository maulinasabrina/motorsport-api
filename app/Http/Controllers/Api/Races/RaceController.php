<?php

namespace App\Http\Controllers\Api\Races;

use App\Http\Controllers\Controller;
use App\Http\Requests\Races\StoreRaceRequest;
use App\Http\Requests\Races\UpdateRaceRequest;
use App\Services\Races\RaceService;
use Illuminate\Http\JsonResponse;

class RaceController extends Controller
{
    protected $service;

    public function __construct(RaceService $service)
    {
        $this->service = $service;
    }

    // GET /api/races?status=upcoming|completed
    public function index(): JsonResponse
    {
        $status = request('status');
        $races = $this->service->list(15, $status);
        return response()->json([
            'success' => true,
            'data' => $races
        ]);
    }

    // GET /api/races/{id}
    public function show($id): JsonResponse
    {
        $race = $this->service->get($id);
        if (!$race) return response()->json(['success'=>false,'message'=>'Race not found'],404);
        return response()->json(['success'=>true,'data'=>$race]);
    }

    // POST /api/races
    public function store(StoreRaceRequest $request): JsonResponse
    {
        $race = $this->service->create($request->validated());
        return response()->json(['success'=>true,'data'=>$race],201);
    }

    // PUT /api/races/{id}
    public function update(UpdateRaceRequest $request, $id): JsonResponse
    {
        $race = $this->service->update($id, $request->validated());
        if(!$race) return response()->json(['success'=>false,'message'=>'Race not found'],404);
        return response()->json(['success'=>true,'data'=>$race]);
    }

    // DELETE /api/races/{id}
    public function destroy($id): JsonResponse
    {
        $deleted = $this->service->delete($id);
        if(!$deleted) return response()->json(['success'=>false,'message'=>'Race not found'],404);
        return response()->json(['success'=>true,'message'=>'Race deleted']);
    }
}
