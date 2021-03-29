<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Agent', 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($roles as $row) {
            DB::table('roles')->insert([
                'name' => $row['name'],
                'created_at' => $row['created_at'],
                'updated_at' => $row['updated_at']
            ]);
        }
    }
}
