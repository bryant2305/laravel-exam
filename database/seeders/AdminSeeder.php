<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RoleUser;
use App\Models\Admin;


class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        #1
        $admin = new Admin();
        $admin->name ='admin';
        $admin->email = env('DEFAULT_ADMIN_USER_EMAIL');
        $admin->password = bcrypt(env('DEFAULT_ADMIN_USER_PASS'));
        $admin->save();

    }
}
