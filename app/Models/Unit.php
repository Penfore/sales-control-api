<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Unit extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'latitude',
    'longitude',
    'manager_id',
    'zone_id',
    'seller_id',
  ];

  public function manager(): HasOne
  {
    return $this->hasOne(User::class, 'manager_id');
  }

  public function zone(): BelongsTo
  {
    return $this->belongsTo(Zone::class, 'zone_id');
  }

  public function sellers(): HasMany
  {
    return $this->hasMany(User::class, 'seller_id');
  }
}
