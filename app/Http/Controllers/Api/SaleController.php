<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use App\Models\Unit;
use App\Models\Zone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaleController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Sale::class, 'sale');
  }

  public function index(): JsonResponse
  {
    $user = Auth::user();

    switch ($user->role) {
      case UserRole::VENDEDOR->value:
        $sales = Sale::where('seller_id', $user->id)->get();
        break;
      case UserRole::GERENTE->value:
        $sales = Sale::where('unit_id', $user->unit_id)->get();
        break;
      case UserRole::DIRETOR->value:
        $zone = Zone::where('director_id', $user->id)->first();
        $units = Unit::where('zone_id', $zone->id)->pluck('id');
        $sales = Sale::whereIn('unit_id', $units)->get();
        break;
      case UserRole::DIRETOR_GERAL->value:
        $sales = Sale::all();
        break;
      default:
        $sales = collect([]);
        break;
    }

    return response()->json(SaleResource::collection($sales));
  }

  public function store(Request $request): JsonResponse
  {
    $validateRequest = $request->validate([
      'amount' => 'required|numeric',
      'sale_date' => 'required|date',
      'latitude' => 'nullable|string',
      'longitude' => 'nullable|string',
    ]);
    $data = [
      ...$validateRequest,
      'seller_id' => $request->user()->id,
      'unit_id' => $request->user()->unit_id,
    ];

    $closestUnit = $this->isRoaming($data);
    if (isset($closestUnit)) {
      $data['closest_unit_id'] = $closestUnit->id;
      $data['is_roaming'] = true;
    } // default já é falso

    $sale = Sale::create($data);

    return response()->json(new SaleResource($sale), 201);
  }

  public function show(Sale $sale): JsonResponse
  {
    $user = Auth::user();
    if ($sale->seller_id === $user->id) {
      return response()->json(new SaleResource($sale));
    } else {
      return response()->json('Unauthorized', 403);
    }
  }

  public function update(Request $request, Sale $sale): JsonResponse
  {
    $validateRequest = $request->validate([
      'amount' => 'sometimes|required|numeric',
      'sale_date' => 'sometimes|required|date',
      'latitude' => 'sometimes|nullable|string',
      'longitude' => 'sometimes|nullable|string',
    ]);
    $data = [
      ...$validateRequest,
      'unit_id' => $sale->unit_id,
    ];

    $closestUnit = $this->isRoaming($data);
    if (isset($closestUnit)) {
      $data['closest_unit_id'] = $closestUnit->id;
      $data['is_roaming'] = true;
    } // default já é falso

    $sale->update($data);

    return response()->json(new SaleResource($sale));
  }

  public function destroy(Sale $sale): JsonResponse
  {
    $sale->delete();

    return response()->json(null, 204);
  }

  private function isRoaming($data): ?Unit
  {
    if (isset($data['latitude']) && isset($data['longitude'])) {
      $closestUnit = Unit::selectRaw(
        '*, (6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) AS distance',
        [$data['latitude'], $data['longitude'], $data['latitude']]
      )->orderBy('distance')->first();

      if ($closestUnit && $data['unit_id'] !== $closestUnit->id) {
        return $closestUnit;
      } else {
        return null;
      }
    } else {
      return null;
    }
  }
}
