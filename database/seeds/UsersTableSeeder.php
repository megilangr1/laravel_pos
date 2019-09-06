<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'MeGilangR',
            'email' => 'megilangr@nweb.com',
            'password' => bcrypt('admin123'),
            'status' => true
        ]);
    }
}
