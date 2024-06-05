<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;

    public const TIPO_CPF = 'cpf';
    public const TIPO_CNPJ = 'cnpj';
}
