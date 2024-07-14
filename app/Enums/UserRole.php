<?php

namespace App\Enums;

enum UserRole: string
{
  case VENDEDOR = 'vendedor';
  case GERENTE = 'gerente';
  case DIRETOR = 'diretor';
  case DIRETOR_GERAL = 'diretor_geral';
}
