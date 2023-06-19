<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ato extends Model
{
    use HasFactory;

    protected $fillable = ['avd_id', 'paciente_id', 'data_hora'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }

    public function avd()
    {
        return $this->belongsTo(Avd::class);
    }
}
