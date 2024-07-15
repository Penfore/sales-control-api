<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Imports\UsersZonesUnitsImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // TODO:
//    $filePath = storage_path('app/data.xlsx');
//    if (file_exists($filePath)) {
//      Excel::import(new UsersZonesUnitsImport, $filePath);
//    } else {
//      $this->command->error("Arquivo não encontrado: $filePath");
//    }
    (new ZoneSeeder)->run();
    (new UnitSeeder)->run();
    (new UserSeeder)->run();
  }
}
