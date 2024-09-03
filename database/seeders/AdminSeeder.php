<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ensure the 'super-admin' role exists
        $role = Role::firstOrCreate(['name' => 'super-admin']);

        // Check if the admin user already exists
        $admin = User::where('email', 'admin@123gmail.com')->first();

        if (!$admin) {
            // Create the admin user if it doesn't exist
            $admin = User::create([
                'name'      => 'Admin',
                'email'     => 'admin@123gmail.com',
                'password'  => Hash::make('Password'), // Ensure to replace 'Password' with a secure password
            ]);

            // Assign the super-admin role to the user
            $admin->assignRole($role);
        }
    }
}
