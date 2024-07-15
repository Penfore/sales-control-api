<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Unit;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UnitSeeder extends Seeder
{
  public function run(): void
  {
    $password = Hash::make('123mudar');

    // Gerentes
    $gerentes = [
      [
        'name' => 'Ronaldinho Gaucho',
        'email' => 'ronaldinho.gaucho@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Roberto Firmino',
        'email' => 'roberto.firmino@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Alex de Souza',
        'email' => 'alex.de.souza@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Françoaldo Souza',
        'email' => 'françoaldo.souza@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Romário Faria',
        'email' => 'romário.faria@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Ricardo Goulart',
        'email' => 'ricardo.goulart@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Dejan Petkovic',
        'email' => 'dejan.petkovic@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Deyverson Acosta',
        'email' => 'deyverson.acosta@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Harlei Silva',
        'email' => 'harlei.silva@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
      [
        'name' => 'Walter Henrique',
        'email' => 'walter.henrique@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::GERENTE->value,
      ],
    ];
    foreach ($gerentes as $gerente) {
      User::create($gerente);
    }
    Log::info('Gerentes criados');

    $units = [
      [
        'name' => 'Porto Alegre',
        'manager_id' => User::where('name', 'Ronaldinho Gaucho')->first()->id,
        'zone_id' => Zone::where('name', 'Sul')->first()->id,
        'latitude' => '-30.048750057541955',
        'longitude' => '-51.228587422990806',
      ],
      [
        'name' => 'Florianopolis',
        'manager_id' => User::where('name', 'Roberto Firmino')->first()->id,
        'zone_id' => Zone::where('name', 'Sul')->first()->id,
        'latitude' => '-27.55393525017396',
        'longitude' => '-48.49841515885026',
      ],
      [
        'name' => 'Curitiba',
        'manager_id' => User::where('name', 'Alex de Souza')->first()->id,
        'zone_id' => Zone::where('name', 'Sul')->first()->id,
        'latitude' => '-25.473704465731746',
        'longitude' => '-49.24787198992874',
      ],
      [
        'name' => 'Sao Paulo',
        'manager_id' => User::where('name', 'Françoaldo Souza')->first()->id,
        'zone_id' => Zone::where('name', 'Sudeste')->first()->id,
        'latitude' => '-23.544259437612844',
        'longitude' => '-46.64370714029131',
      ],
      [
        'name' => 'Rio de Janeiro',
        'manager_id' => User::where('name', 'Romário Faria')->first()->id,
        'zone_id' => Zone::where('name', 'Sudeste')->first()->id,
        'latitude' => '-22.923447510604802',
        'longitude' => '-43.23208495438858',
      ],
      [
        'name' => 'Belo Horizonte',
        'manager_id' => User::where('name', 'Ricardo Goulart')->first()->id,
        'zone_id' => Zone::where('name', 'Sudeste')->first()->id,
        'latitude' => '-19.917854829716372',
        'longitude' => '-43.94089385954766',
      ],
      [
        'name' => 'Vitória',
        'manager_id' => User::where('name', 'Dejan Petkovic')->first()->id,
        'zone_id' => Zone::where('name', 'Sudeste')->first()->id,
        'latitude' => '-20.340992420772206',
        'longitude' => '-40.38332271475097',
      ],
      [
        'name' => 'Campo Grande',
        'manager_id' => User::where('name', 'Deyverson Acosta')->first()->id,
        'zone_id' => Zone::where('name', 'Centro-oeste')->first()->id,
        'latitude' => '-20.462652006300377',
        'longitude' => '-54.615658937666645',
      ],
      [
        'name' => 'Goiania',
        'manager_id' => User::where('name', 'Harlei Silva')->first()->id,
        'zone_id' => Zone::where('name', 'Centro-oeste')->first()->id,
        'latitude' => '-16.673126240814387',
        'longitude' => '-49.25248826354209',
      ],
      [
        'name' => 'Cuiaba',
        'manager_id' => User::where('name', 'Walter Henrique')->first()->id,
        'zone_id' => Zone::where('name', 'Centro-oeste')->first()->id,
        'latitude' => '-15.601754458320842',
        'longitude' => '-56.09832706558089',
      ],
    ];
    foreach ($units as $unit) {
      $unitCreated = Unit::create($unit);
      $gerenteParaAtualizar = User::where('id', $unit['manager_id'])->first();
      $gerenteParaAtualizar->update(['unit_id' => $unitCreated->id]);
    }
    Log::info('Unidades criadas');
  }
}
