<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZoneResource;
use App\Models\Zone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Zone::class, 'zone');
  }

  public function index(): JsonResponse
  {
    $zones = Zone::all();
    return response()->json(ZoneResource::collection($zones));
  }

  public function store(Request $request): JsonResponse
  {
    $data = $request->validate([
      'name' => 'required|string|max:255',
      'director_id' => 'required|exists:users,id',
    ]);
    $zone = Zone::create($data);

    return response()->json(new ZoneResource($zone), 201);
  }

  public function show(Zone $zone): JsonResponse
  {
    return response()->json(new ZoneResource($zone));
  }

  public function update(Request $request, Zone $zone): JsonResponse
  {
    $data = $request->validate([
      'name' => 'sometimes|required|string|max:255',
      'director_id' => 'sometimes|required|exists:users,id',
    ]);

    $zone->update($data);

    return response()->json(new ZoneResource($zone));
  }

  public function destroy(Zone $zone): JsonResponse
  {
    $zone->delete();

    return response()->json(null, 204);
  }
}
