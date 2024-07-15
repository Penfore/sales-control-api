<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ZonePolicy
{
  use HandlesAuthorization;

  public function viewAny(User $user): bool

  {
    return in_array($user->role, array_column(UserRole::cases(), 'value'));
  }

  public function view(User $user, Zone $zone): bool
  {
    return in_array($user->role, array_column(UserRole::cases(), 'value'));
  }

  public function create(User $user): bool
  {
    return in_array($user->role, [UserRole::DIRETOR_GERAL->value]);
  }

  public function update(User $user, Zone $zone): bool
  {
    return in_array($user->role, [UserRole::DIRETOR_GERAL->value]);
  }

  public function delete(User $user, Zone $zone): bool
  {
    return in_array($user->role, [UserRole::DIRETOR_GERAL->value]);
  }
}
