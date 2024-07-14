<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
{
  use HandlesAuthorization;

  public function viewAny(User $user, Sale $sale): bool
  {
    if ($user->role == UserRole::VENDEDOR->value) {
      return $sale->seller_id === $user->id;
    } elseif ($user->role == UserRole::GERENTE->value) {
      return $sale->unit_id === $user->unit_id;
    }
    return true;
  }

  public function view(User $user, Sale $sale): bool
  {
    if ($user->role == UserRole::VENDEDOR->value) {
      return $sale->seller_id === $user->id;
    } elseif ($user->role == UserRole::GERENTE->value) {
      return $sale->unit_id === $user->unit_id;
    }
    return true;
  }

  public function create(User $user): bool
  {
    return $user->role == UserRole::VENDEDOR->value;
  }

  public function update(User $user, Sale $sale): bool
  {
    return $user->role == UserRole::VENDEDOR->value;
  }

  public function delete(User $user, Sale $sale): bool
  {
    return in_array($user->role, [UserRole::GERENTE->value, UserRole::DIRETOR->value, UserRole::DIRETOR_GERAL->value]);
  }
}
