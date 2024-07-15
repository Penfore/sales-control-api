<?php

namespace App\Imports;

use App\Enums\UserRole;
use App\Models\Unit;
use App\Models\User;
use App\Models\Zone;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersZonesUnitsImport implements ToCollection
{
  /**
   * @throws Exception
   */
  public function collection(Collection $collection): void
  {
    // TODO:
//    // Diretoria Geral
//    $generalDirectorRow = $collection->firstWhere('Diretor Geral', '!=', null);
//    if ($generalDirectorRow === null) {
//      throw new Exception("Não foi possível encontrar a linha do Diretor Geral");
//    }
//
//    $generalDirector = User::create([
//      'name' => $generalDirectorRow['Diretor Geral'],
//      'email' => $generalDirectorRow['E-mail'],
//      'password' => Hash::make('123mudar'),
//      'role' => UserRole::DIRETOR_GERAL->value
//    ]);
//
//    // Diretoria
//    $zones = $collection->filter(function ($row) {
//      return isset($row['Nome Diretoria']);
//    });
//    foreach ($zones as $zone) {
//      if (!isset($zone['Diretor'], $zone['E-mail'], $zone['Nome Diretoria'])) {
//        throw new Exception("Colunas faltando na linha da diretoria");
//      }
//
//      // Diretores
//      $director = User::create([
//        'name' => $zone['Diretor'],
//        'email' => $zone['E-mail'],
//        'password' => Hash::make('123mudar'),
//        'role' => UserRole::DIRETOR->value
//      ]);
//
//      Zone::create([
//        'name' => $zone['Nome Diretoria'],
//        'director_id' => $director->id
//      ]);
//    }
//
//    // Unidade
//    $units = $collection->filter(function ($row) {
//      return isset($row['Unidade']);
//    });
//    foreach ($units as $unit) {
//      if (!isset($unit['Unidade'], $unit['Lat_Lon'], $unit['Gerente'], $unit['Diretoria'], $unit['E-mail'])) {
//        throw new Exception("Colunas faltando na linha da unidade");
//      }
//
//      // Gerentes
//      $manager = User::create([
//        'name' => $unit['Gerente'],
//        'email' => $unit['E-mail'],
//        'password' => Hash::make('123mudar'),
//        'role' => UserRole::GERENTE->value
//      ]);
//
//      $zone = Zone::where('name', $unit['Diretoria'])->first();
//
//      if ($zone === null) {
//        throw new Exception("Não foi possível encontrar a diretoria para a unidade: " . $unit['Unidade']);
//      }
//
//      $latLon = explode(',', $unit['Lat_Lon']);
//      if (count($latLon) !== 2) {
//        throw new Exception("Coordenadas de latitude e longitude inválidas para a unidade: " . $unit['Unidade']);
//      }
//
//      Unit::create([
//        'name' => $unit['Unidade'],
//        'latitude' => trim($latLon[0]),
//        'longitude' => trim($latLon[1]),
//        'manager_id' => $manager->id,
//        'zone_id' => $zone->id
//      ]);
//    }
//
//    // Vendedores
//    $sellers = $collection->filter(function ($row) {
//      return isset($row['Vendedor']);
//    });
//    foreach ($sellers as $seller) {
//      if (!isset($seller['Vendedor'], $seller['Unidade'], $seller['E-mail'])) {
//        throw new Exception("Colunas faltando na linha do vendedor");
//      }
//
//      $unit = Unit::where('name', $seller['Unidade'])->first();
//
//      if ($unit === null) {
//        throw new Exception("Não foi possível encontrar a unidade para o vendedor: " . $seller['Vendedor']);
//      }
//
//      User::create([
//        'name' => $seller['Vendedor'],
//        'email' => $seller['E-mail'],
//        'password' => Hash::make('123mudar'),
//        'role' => UserRole::VENDEDOR->value,
//        'unit_id' => $unit->id
//      ]);
//    }
  }
}
