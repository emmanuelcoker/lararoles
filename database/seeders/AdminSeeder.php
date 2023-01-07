<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Role, User};

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin
        $admin = User::create([
            'name' => 'administrator',
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        $role = Role::where('role_name', 'admin')->first();
        
        $admin->roles()->attach($role);

    }
}
