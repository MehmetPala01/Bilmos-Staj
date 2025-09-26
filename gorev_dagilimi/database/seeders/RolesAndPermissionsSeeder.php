<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Sadece 2 rol
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'personel']);
    }
}
