<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserSeeder extends Seeder
{
  public function run(): void
  {
    $password = Hash::make('123mudar');

    // Vendedores
    $vendedores = [
      [
        'name' => 'Afonso Afancar',
        'email' => 'afonso.afancar@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Belo Horizonte')->first()->id,
      ],
      [
        'name' => 'Alceu Andreoli',
        'email' => 'alceu.andreoli@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Belo Horizonte')->first()->id,
      ],
      [
        'name' => 'Amalia Zago',
        'email' => 'amalia.zago@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Belo Horizonte')->first()->id,
      ],
      [
        'name' => 'Carlos Eduardo',
        'email' => 'carlos.eduardo@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Belo Horizonte')->first()->id,
      ],
      [
        'name' => 'Luiz Felipe',
        'email' => 'luiz.felipe@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Belo Horizonte')->first()->id,
      ],
      [
        'name' => 'Breno',
        'email' => 'breno@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Campo Grande')->first()->id,
      ],
      [
        'name' => 'Emanuel',
        'email' => 'emanuel@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Campo Grande')->first()->id,
      ],
      [
        'name' => 'Ryan',
        'email' => 'ryan@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Campo Grande')->first()->id,
      ],
      [
        'name' => 'Vitor Hugo',
        'email' => 'vitor.hugo@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Campo Grande')->first()->id,
      ],
      [
        'name' => 'Yuri',
        'email' => 'yuri@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Campo Grande')->first()->id,
      ],
      [
        'name' => 'Benjamin',
        'email' => 'benjamin@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Cuiaba')->first()->id,
      ],
      [
        'name' => 'Erick',
        'email' => 'erick@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Cuiaba')->first()->id,
      ],
      [
        'name' => 'Enzo Gabriel',
        'email' => 'enzo.gabriel@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Cuiaba')->first()->id,
      ],
      [
        'name' => 'Fernando',
        'email' => 'fernando@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Cuiaba')->first()->id,
      ],
      [
        'name' => 'Joaquim',
        'email' => 'joaquim@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Cuiaba')->first()->id,
      ],
      [
        'name' => 'André',
        'email' => 'andré@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Curitiba')->first()->id,
      ],
      [
        'name' => 'Raul',
        'email' => 'raul@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Curitiba')->first()->id,
      ],
      [
        'name' => 'Marcelo',
        'email' => 'marcelo@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Curitiba')->first()->id,
      ],
      [
        'name' => 'Julio César',
        'email' => 'julio.césar@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Curitiba')->first()->id,
      ],
      [
        'name' => 'Cauê',
        'email' => 'cauê@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Curitiba')->first()->id,
      ],
      [
        'name' => 'Benício',
        'email' => 'benício@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Florianopolis')->first()->id,
      ],
      [
        'name' => 'Vitor Gabriel',
        'email' => 'vitor.gabriel@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Florianopolis')->first()->id,
      ],
      [
        'name' => 'Augusto',
        'email' => 'augusto@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Florianopolis')->first()->id,
      ],
      [
        'name' => 'Pedro Lucas',
        'email' => 'pedro.lucas@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Florianopolis')->first()->id,
      ],
      [
        'name' => 'Luiz Gustavo',
        'email' => 'luiz.gustavo@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Florianopolis')->first()->id,
      ],
      [
        'name' => 'Giovanni',
        'email' => 'giovanni@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Goiania')->first()->id,
      ],
      [
        'name' => 'Renato',
        'email' => 'renato@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Goiania')->first()->id,
      ],
      [
        'name' => 'Diego',
        'email' => 'diego@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Goiania')->first()->id,
      ],
      [
        'name' => 'João Paulo',
        'email' => 'joão.paulo@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Goiania')->first()->id,
      ],
      [
        'name' => 'Renan',
        'email' => 'renan@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Goiania')->first()->id,
      ],
      [
        'name' => 'Luiz Fernando',
        'email' => 'luiz.fernando@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Porto Alegre')->first()->id,
      ],
      [
        'name' => 'Anthony',
        'email' => 'anthony@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Porto Alegre')->first()->id,
      ],
      [
        'name' => 'Lucas Gabriel',
        'email' => 'lucas.gabriel@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Porto Alegre')->first()->id,
      ],
      [
        'name' => 'Thales',
        'email' => 'thales@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Porto Alegre')->first()->id,
      ],
      [
        'name' => 'Luiz Miguel',
        'email' => 'luiz.miguel@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Porto Alegre')->first()->id,
      ],
      [
        'name' => 'Henry',
        'email' => 'henry@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Rio de Janeiro')->first()->id,
      ],
      [
        'name' => 'Marcos Vinicius',
        'email' => 'marcos.vinicius@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Rio de Janeiro')->first()->id,
      ],
      [
        'name' => 'Kevin',
        'email' => 'kevin@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Rio de Janeiro')->first()->id,
      ],
      [
        'name' => 'Levi',
        'email' => 'levi@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Rio de Janeiro')->first()->id,
      ],
      [
        'name' => 'Enrico',
        'email' => 'enrico@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Rio de Janeiro')->first()->id,
      ],
      [
        'name' => 'João Lucas',
        'email' => 'joão.lucas@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Sao Paulo')->first()->id,
      ],
      [
        'name' => 'Hugo',
        'email' => 'hugo@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Sao Paulo')->first()->id,
      ],
      [
        'name' => 'Luiz Guilherme',
        'email' => 'luiz.guilherme@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Sao Paulo')->first()->id,
      ],
      [
        'name' => 'Matheus Henrique',
        'email' => 'matheus.henrique@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Sao Paulo')->first()->id,
      ],
      [
        'name' => 'Miguel',
        'email' => 'miguel@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Sao Paulo')->first()->id,
      ],
      [
        'name' => 'Davi',
        'email' => 'davi@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Vitória')->first()->id,
      ],
      [
        'name' => 'Gabriel',
        'email' => 'gabriel@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Vitória')->first()->id,
      ],
      [
        'name' => 'Arthur',
        'email' => 'arthur@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Vitória')->first()->id,
      ],
      [
        'name' => 'Lucas',
        'email' => 'lucas@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Vitória')->first()->id,
      ],
      [
        'name' => 'Matheus',
        'email' => 'matheus@magazineaziul.com.br',
        'password' => $password,
        'role' => UserRole::VENDEDOR->value,
        'unit_id' => Unit::where('name', 'Vitória')->first()->id,
      ],
    ];
    foreach ($vendedores as $vendedor) {
      User::create($vendedor);
    }
    Log::info('Vendedores criados');
  }
}
