<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Persona extends Model
{
	protected $table = 'personas';
    
    protected $fillable = [
        'dip', 'ap_paterno', 'ap_materno', 'nombres'
    ];

    public function prestamos(){

        return $this->hasMany('App\Model\Prestamo');
    }
}
