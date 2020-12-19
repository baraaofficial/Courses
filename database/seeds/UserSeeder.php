<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name' => 'Baraa',
            'email' => 'baraa@app.com',
            'location' => 'Egypt, Alex',
            'is_admin' => 'admin',
            'phone' => '010658583855',
            'password' => bcrypt('12345678')
        ]);
        $user->attachRole('super_admin');
    }
}
