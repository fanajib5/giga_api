<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create developer user will be as a Super Admin
        $user = User::create([
            'first_name' => 'Dev',
            'email' => 'dev@dev.id',
            'password' => 'Developer123',
            'email_verified_at' => now(), // menggunakan carbon atau langsung now() sama saja.
        ]);

        // dd($user);

        // assign the user as developer role
        // $user->syncRoles(['developer']);

        // create a user
        $user = User::create([
            'first_name' => 'Admin',
            'email' => 'admin@example.id',
            'password' => 'Admin123',
            'email_verified_at' => now(),
        ]);

        // assign the user as admin role
        // $user->syncRoles(['admin']);

        // create a user
        $user = User::create([
            'first_name' => 'User',
            'email' => 'user@example.id',
            'password' => 'User1234',
            'email_verified_at' => now(),
        ]);
    }
}