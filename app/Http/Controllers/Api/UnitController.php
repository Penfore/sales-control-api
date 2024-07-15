<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Resources\UnitResource;
use App\Models\Unit;
use App\Models\User;
use App\Models\Zone;
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
    $validateRequest = $request->validate([
      'name' => 'required|string|max:255',
      'latitude' => 'required|string',
      'longitude' => 'required|string',
      'manager_name' => 'required|string',
      'zone_name' => 'required|string',
    ]);

    $manager_id = User::where('name', $validateRequest['manager_name'])->value('id');
    if (!isset($manager_id)) {
      return response()->json('No user found with this name', 400);
    } else {
      User::where('id', 'manager_id')->update(['role' => UserRole::GERENTE]);
    }
    $zone_id = Zone::where('name', $validateRequest['zone_name'])->value('id');
    if (!isset($zone_id)) {
      return response()->json('No zone found with this name', 400);
    }

    $data = [
      'name' => $validateRequest['name'],
      'latitude' => $validateRequest['latitude'],
      'longitude' => $validateRequest['longitude'],
      'manager_id' => User::where('name', $validateRequest['manager_name'])->first()->id,
      'zone_id' => Zone::where('name', $validateRequest['zone_name'])->first()->id,
    ];

    $unit = Unit::create($data);

    return response()->json(new UnitResource($unit), 201);
  }

  public function show(Unit $unit): JsonResponse
  {
    return response()->json(new UnitResource($unit));
  }

  public function update(Request $request, Unit $unit): JsonResponse
  {
    $validateRequest = $request->validate([
      'name' => 'sometimes|string|max:255',
      'latitude' => 'sometimes|string',
      'longitude' => 'sometimes|string',
      'manager_name' => 'sometimes|string',
      'zone_name' => 'sometimes|string',
    ]);

    if (isset($validateRequest['name'])) {
      $manager_id = User::where('name', $validateRequest['manager_name'])->value('id');
      if (!isset($manager_id)) {
        return response()->json('No user found with this name', 400);
      } else {
        User::where('id', $unit->manager_id)->update(['role' => UserRole::VENDEDOR]); // Antigo gerente
        User::where('id', 'manager_id')->update(['role' => UserRole::GERENTE]); // Novo gerente
      }
    }
    if (isset($validateRequest['zone_name'])) {
      $zone_id = Zone::where('name', $validateRequest['zone_name'])->value('id');
      if (!isset($zone_id)) {
        return response()->json('No zone found with this name', 400);
      }
    }

    $data = [
      'name' => $validateRequest['name'],
      'latitude' => $validateRequest['latitude'],
      'longitude' => $validateRequest['longitude'],
      'manager_id' => isset($validateRequest['name']) ? User::where('name', $validateRequest['manager_name'])->first()->id : null,
      'zone_id' => isset($validateRequest['zone_name']) ? Zone::where('name', $validateRequest['zone_name'])->first()->id : null,
    ];

    $unit->update($data);

    return response()->json(new UnitResource($unit));
  }

  public function destroy(Unit $unit): JsonResponse
  {
    $unit->delete();

    return response()->json(null, 204);
  }
}
