<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Zone extends Model
{
  use HasFactory;

  protected $fillable = [
    'name',
    'director_id',
    'unit_id',
  ];

  public function director(): HasOne
  {
    return $this->hasOne(User::class, 'id', 'director_id');
  }

  public function units(): HasMany
  {
    return $this->hasMany(Unit::class);
  }
}
