<?php

use Illuminate\Database\Seeder;
use App\Model\Comprobante;

class ComprobanteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comprobante::create([
            'fecha_despacho'=>'2016-04-18',
            'gestion'=>'2016',
            'cod_archivo'=>'C-31 CIP#1724',
            'tipo_archivo'=>'C-31-CI',
            'fecha_recepcion'=>'2016-04-19'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2016-04-20',
            'gestion'=>'2016',
            'cod_archivo'=>'C-31 CIP#741',
            'tipo_archivo'=>'C-31-CI',
            'fecha_recepcion'=>'2016-04-22'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2011-03-12',
            'gestion'=>'2011',
            'cod_archivo'=>'C-31 CIP#3826',
            'tipo_archivo'=>'C-31-CI',
            'fecha_recepcion'=>'2011-03-13'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2017-01-02',
            'gestion'=>'2017',
            'cod_archivo'=>'C-31 SIP#357',
            'tipo_archivo'=>'C-31-CI',
            'fecha_recepcion'=>'2017-01-04'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2016-01-03',
            'gestion'=>'2016',
            'cod_archivo'=>'MANUAL# 788',
            'tipo_archivo'=>'DIARIO',
            'fecha_recepcion'=>'2016-01-04'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2017-02-10',
            'gestion'=>'2017',
            'cod_archivo'=>'MANUAL# 833',
            'tipo_archivo'=>'DIARIO',
            'fecha_recepcion'=>'2017-02-11'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2017-02-09',
            'gestion'=>'2017',
            'cod_archivo'=>'AMARILLO# 243',
            'tipo_archivo'=>'C-31-SI',
            'fecha_recepcion'=>'2017-02-10'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2016-05-29',
            'gestion'=>'2016',
            'cod_archivo'=>'AMARILLO# 1253',
            'tipo_archivo'=>'C-31-SI',
            'fecha_recepcion'=>'2016-05-30'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2016-05-09',
            'gestion'=>'2016',
            'cod_archivo'=>'C-21 SIP AMARILLO# 1243',
            'tipo_archivo'=>'C-21-SI',
            'fecha_recepcion'=>'2016-05-11'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2015-08-15',
            'gestion'=>'2015',
            'cod_archivo'=>'C-31 BLANCO# 607',
            'tipo_archivo'=>'C-21-CI',
            'fecha_recepcion'=>'2015-08-16'
        ]);
        Comprobante::create([
            'fecha_despacho'=>'2016-10-19',
            'gestion'=>'2016',
            'cod_archivo'=>'CELESTE# 164',
            'tipo_archivo'=>'REGURALIZACION',
            'fecha_recepcion'=>'2016-10-20'
        ]);
    }
}
