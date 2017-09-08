<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comprobante extends Model
{
    protected $table = 'comprobantes';

    protected $fillable = [
        'fecha_despacho', 'gestion', 'cod_archivo', 'tipo_archivo', 'fecha_recepcion'
    ];
    public $rules = [
    	'fecha_despacho'	=>	'required',
    	'gestion'			=>	'required|numeric|max:2017',
    	'cod_archivo'		=>	'required|max:100',
    	'tipo_archivo'		=>	'required'
    ];

    public function prestamos(){

        return $this->hasOne('App\Model\Prestamo');
    }

    public function scopeComprobante($query, $cod_archivo){
        //dd("scope:".$cod_archivo);
        if($cod_archivo != ""){
            $query->where('id', $cod_archivo);
        }
    }
    public function scopeCod_archivo($query, $cod_archivo){
        //dd("scope:".$cod_archivo);
        if($cod_archivo != ""){
            $query->where('cod_archivo', $cod_archivo);
        }
    }
}
