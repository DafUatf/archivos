<?php

use Illuminate\Database\Seeder;
use App\Model\Persona;
class PersonaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Persona::create([
            'dip'=>'1234567',
            'ap_paterno'=>'VARGAS',
            'ap_materno'=>'VILLCA',
            'nombres'=>'RONALD'
        ]);
        Persona::create([
            'dip'=>'8572962',
            'ap_paterno'=>'VARGAS',
            'ap_materno'=>'HUANCA',
            'nombres'=>'MATHIAS'
        ]);
    }
}
