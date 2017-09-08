<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PersonaTableSeeder::class);
         $this->call(UserTableseeder::class);
        $this->call(ComprobanteTableSeeder::class);
       
    }
}
