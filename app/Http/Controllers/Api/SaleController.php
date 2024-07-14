<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\SaleResource;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SaleController extends Controller
{
  public function __construct()
  {
    $this->authorizeResource(Sale::class, 'sale');
  }

  public function index(): JsonResponse
  {
    $sales = Sale::all();
    return response()->json(SaleResource::collection($sales));
  }

  public function store(Request $request): JsonResponse
  {
    $data = $request->validate([
      'seller_id' => 'required|exists:users,id',
      'unit_id' => 'required|exists:units,id',
      'closest_unit_id' => 'nullable|exists:units,id',
      'amount' => 'required|numeric',
      'sale_date' => 'required|date',
      'latitude' => 'nullable|string',
      'longitude' => 'nullable|string',
    ]);

    $sale = Sale::create($data);

    return response()->json(new SaleResource($sale), 201);
  }

  public function show(Sale $sale): JsonResponse
  {
    return response()->json(new SaleResource($sale));
  }

  public function update(Request $request, Sale $sale): JsonResponse
  {
    $data = $request->validate([
      'seller_id' => 'sometimes|required|exists:users,id',
      'unit_id' => 'sometimes|required|exists:units,id',
      'closest_unit_id' => 'nullable|exists:units,id',
      'amount' => 'sometimes|required|numeric',
      'sale_date' => 'sometimes|required|date',
      'latitude' => 'nullable|string',
      'longitude' => 'nullable|string',
    ]);

    $sale->update($data);

    return response()->json(new SaleResource($sale));
  }

  public function destroy(Sale $sale): JsonResponse
  {
    $sale->delete();

    return response()->json(null, 204);
  }
}
