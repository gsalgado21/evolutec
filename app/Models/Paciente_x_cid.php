<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente_x_cid extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id', 'cid_id'];
}
