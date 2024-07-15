<?php

namespace App\Policies;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
  use HandlesAuthorization;

  public function register(User $user): bool
  {
    return in_array($user->role, [UserRole::GERENTE, UserRole::DIRETOR->value, UserRole::DIRETOR_GERAL->value]);
  }
}
