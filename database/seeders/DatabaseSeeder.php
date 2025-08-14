<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@sijago.com',
            'password' => Hash::make('123'), // password di-hash
            'is_admin' => true, // kalau kolom ini ada di tabel users
        ]);
    }
}
