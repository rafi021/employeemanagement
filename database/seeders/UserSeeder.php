<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin user
        User::updateOrCreate([
            'username' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'user',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make(12345678), // 12345678
            'remember_token' => Str::random(10),
        ]);
        User::factory(10)->create();
    }
}
