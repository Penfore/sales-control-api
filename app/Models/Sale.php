<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sale extends Model
{
  use HasFactory;

  protected $fillable = [
    'seller_id',
    'unit_id',
    'closest_unit_id',
    'amount',
    'sale_date',
    'latitude',
    'longitude',
  ];

  public function seller(): BelongsTo
  {
    return $this->belongsTo(User::class, 'seller_id');
  }

  public function unit(): BelongsTo
  {
    return $this->belongsTo(Unit::class, 'unit_id');
  }

  public function closestUnit(): HasOne
  {
    return $this->hasOne(Unit::class, 'closest_unit_id');
  }
}
