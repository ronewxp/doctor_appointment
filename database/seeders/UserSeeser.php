<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('slug','admin')->first();
        // Create admin
        User::updateOrCreate([
            'role_id' => $adminRole->id,
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'),
            'status' => true
        ]);

        // Create user
        $userRole = Role::where('slug','user')->first();
        User::updateOrCreate([
            'role_id' => $userRole->id,
            'name' => 'User',
            'email' => 'user@mail.com',
            'password' => Hash::make('123456'),
            'status' => true
        ]);

        // Create user
        $userRole = Role::where('slug','doctor')->first();
        User::updateOrCreate([
            'role_id' => $userRole->id,
            'name' => 'Doctor',
            'email' => 'doctor@mail.com',
            'password' => Hash::make('123456'),
            'status' => true
        ]);
    }
}
