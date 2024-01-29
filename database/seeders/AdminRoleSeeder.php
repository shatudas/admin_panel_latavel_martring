<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AdminRole;


class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdminRole::create([
            'name' => 'Administrator'
        ]);

        AdminRole::create([
            'name' => 'Admin'
        ]);

        AdminRole::create([
            'name' => 'Editor'
        ]);
    }
}
