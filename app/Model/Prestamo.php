<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'fecha_prestamo', 'unidad', 'persona_dip', 'fecha_devolucion','comprobante_cod_archivo', 'observacion'
    ];
   

    public function comprobantes(){

        return $this->hasOne('App\Model\Comprobante');
    }
    public function personas(){
    	
        return $this->belongsTo('App\Model\Persona');
    }
}
