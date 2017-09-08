<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'ronald',
            'email'=>'ronald@gmail.com',
            'password'=>bcrypt('1234567')
        ]);
    }
}
