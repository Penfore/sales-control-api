<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ZoneSeeder extends Seeder
{
  public function run(): void
  {
    $password = Hash::make('123mudar');

    // Diretor Geral
    User::create([
      'name' => "Edson A. do Nascimento",
      'email' => "pele@magazineaziul.com.br",
      'password' => $password,
      'role' => UserRole::DIRETOR_GERAL->value,
    ]);
    Log::info('Diretor Geral criado');

    // Diretores
    $diretores = [
      [
        'name' => "Vagner Mancini",
        'email' => "vagner.mancini@magazineaziul.com.br",
        'password' => $password,
        'role' => UserRole::DIRETOR->value,
      ],
      [
        'name' => "Abel Ferreira",
        'email' => "abel.ferreira@magazineaziul.com.br",
        'password' => $password,
        'role' => UserRole::DIRETOR->value,
      ],
      [
        'name' => "Rogerio Ceni",
        'email' => "rogerio.ceni@magazineaziul.com.br",
        'password' => $password,
        'role' => UserRole::DIRETOR->value,
      ],
    ];
    foreach ($diretores as $diretor) {
      User::create($diretor);
    }
    Log::info('Diretores criados');

    $zones = [
      [
        'name' => 'Sul',
        'director_id' => User::where('name', 'Vagner Mancini')->first()->id,
      ],
      [
        'name' => 'Sudeste',
        'director_id' => User::where('name', 'Abel Ferreira')->first()->id,
      ],
      [
        'name' => 'Centro-oeste',
        'director_id' => User::where('name', 'Rogerio Ceni')->first()->id,
      ]
    ];
    foreach ($zones as $zone) {
      $zoneCreated = Zone::create($zone);
      $diretorParaAtualizar = User::where('id', $zone['director_id'])->first();
      $diretorParaAtualizar->update(['zone_id' => $zoneCreated->id]);
    }
    Log::info('Diretorias criadas');
  }
}
