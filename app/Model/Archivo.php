<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table="archivos";
    protected $table= ['detalle','tipo','url_imagen','pertenencia','fecha_registro'];

        public $rules = [
    	'detalle'	=>	'required|max:100',
    	'tipo'			=>	'required',
    	'url_imagen'		=>	'required',
    	'tipo_archivo'		=>	'required'
    ];
    public function comprobantes(){
    	return $this->belongsTo('App\Model\Comprobante');
    }

}
