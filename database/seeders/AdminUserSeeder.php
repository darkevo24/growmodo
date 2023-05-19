<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'phone' => '123456789',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);
    }
}
