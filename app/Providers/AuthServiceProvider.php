<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Sale;
use App\Models\Unit;
use App\Models\Zone;
use App\Policies\SalePolicy;
use App\Policies\UnitPolicy;
use App\Policies\ZonePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The model to policy mappings for the application.
   *
   * @var array<class-string, class-string>
   */
  protected $policies = [
    Zone::class => ZonePolicy::class,
    Unit::class => UnitPolicy::class,
    Sale::class => SalePolicy::class,
  ];

  /**
   * Register any authentication / authorization services.
   */
  public function boot(): void
  {
    $this->registerPolicies();
  }
}
