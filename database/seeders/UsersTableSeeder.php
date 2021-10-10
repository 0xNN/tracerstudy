<?php

namespace Database\Seeders;

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
        \App\Models\User::create([
            'name'	=> 'Sendi',
            'email'	=> 'sendinoviansyah02@gmail.com',
            'password'	=> bcrypt('sendi021196')
        ]);
    }
}
