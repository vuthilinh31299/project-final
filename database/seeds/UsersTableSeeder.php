<?php

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
        App\User::create([
            'name' => 'admin',
            'email' => 'plan_travel@admin.com',
            'password' => bcrypt('123123'),
            'is_admin' => 1,
        ]);
    }
}
