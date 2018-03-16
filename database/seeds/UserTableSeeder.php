<?php

use Illuminate\Database\Seeder;

use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return User::create([
        	'name' => 'Administrator',
        	'email' => 'admin@pakarpadi.com',
        	'password' => bcrypt('admin'),
        ]);
    }
}
