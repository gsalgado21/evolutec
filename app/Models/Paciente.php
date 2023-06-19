<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'profissional_id', 'email', 'password'];   

    public function profissional()
    {
        return $this->belongsTo(Profissional::class);   
    }

    public function ato()
    {
        return $this->hasMany(Ato::class, 'paciente_id');
    }

    public function cids()
    {
        return $this->belongsToMany(Cid::class, 'paciente_x_cids', 'paciente_id', 'cid_id')->withTimestamps();
    }

    public function relatorios()
    {
        return $this->hasMany(Relatorio::class);
    }

}
