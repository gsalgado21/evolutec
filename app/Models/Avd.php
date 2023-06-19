<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avd extends Model
{
    use HasFactory;

    protected $fillable = ['descricao'];

    public function ato()
    {
        return $this->hasMany(Ato::class);
    }
}
