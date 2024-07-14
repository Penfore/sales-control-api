<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UnitController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Unit::class, 'unit');
  }

  public function index(): JsonResponse
  {
    $units = Unit::all();
    return response()->json(UnitResource::collection($units));
  }

  public function store(Request $request): JsonResponse
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'latitude' => 'required|string',
      'longitude' => 'required|string',
      'manager_id' => 'required|exists:users,id',
      'zone_id' => 'required|exists:zones,id',
    ]);

    $unit = Unit::create($data);

    return response()->json(new UnitResource($unit), 201);
  }

  public function show(Unit $unit): JsonResponse
  {
    return response()->json(new UnitResource($unit));
  }

  public function update(Request $request, Unit $unit): JsonResponse
  {
    $data = $request->validate([
      'name' => 'sometimes|required|string|max:255',
      'latitude' => 'sometimes|required|string',
      'longitude' => 'sometimes|required|string',
      'manager_id' => 'sometimes|required|exists:users,id',
      'zone_id' => 'sometimes|required|exists:zones,id',
    ]);

    $unit->update($data);

    return response()->json(new UnitResource($unit));
  }

  public function destroy(Unit $unit): JsonResponse
  {
    $unit->delete();

    return response()->json(null, 204);
  }
}
