<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Ambil data dari .env
        $adminName = env('ADMIN_NAME', 'Default Admin');
        $adminEmail = env('ADMIN_EMAIL', 'admin@default.com');
        $adminPassword = env('ADMIN_PASSWORD', 'password');
        $adminUsertype = env('ADMIN_USERTYPE', 'admin');

        // Buat admin user
        User::updateOrCreate(
            ['email' => $adminEmail],
            [
                'name' => $adminName,
                'password' => Hash::make($adminPassword),
                'usertype' => $adminUsertype,
            ]
        );
    }
}