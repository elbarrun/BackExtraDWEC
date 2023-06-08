<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;
    protected $fillable=["tipo","descripcion","puertas","asientos","tipo_conduccion","precio_dia"];

    public function reservas(){
        return $this->hasMany('App\Models\Reserva');
    }
}
