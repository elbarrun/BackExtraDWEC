<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable=["coche_id","user_id","fecha_inicio","fecha_fin","precio_total","estado"];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function coche(){
        return $this->belongsTo('App\Models\Coche');
    }
    public function extras(){
        return $this->belongsToMany('App\Models\Extra');
    }

}
