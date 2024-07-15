<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SalePolicy
{
  use HandlesAuthorization;

  public function viewAny(User $user): bool
  {
    return true;
  }

  public function view(User $user): bool
  {
    return true;
  }

  public function create(User $user): bool
  {
    return $user->role == UserRole::VENDEDOR->value;
  }

  public function update(User $user, Sale $sale): bool
  {
    return $user->role == UserRole::VENDEDOR->value && $user->id === $sale->seller_id;
  }

  public function delete(User $user, Sale $sale): bool
  {
    return in_array($user->role, [UserRole::GERENTE->value, UserRole::DIRETOR->value, UserRole::DIRETOR_GERAL->value]);
  }
}
