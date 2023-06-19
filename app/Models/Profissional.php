<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
    use HasFactory;

    protected $fillable = ['crm', 'nome', 'especialidade', 'tipo'];

    public function paciente()
    {
        return $this->hasMany(Paciente::class);
    }
}
