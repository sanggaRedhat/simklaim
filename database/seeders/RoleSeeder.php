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
        DB::table('roles')->insert([
            'name'=>'admin'
        ]);

        DB::table('roles')->insert([
            'name'=>'role_maker'
        ]);

        DB::table('roles')->insert([
            'name'=>'role_validation_finance'
        ]);

        DB::table('roles')->insert([
            'name'=>'role_validation_trust'
        ]);

        DB::table('roles')->insert([
            'name'=>'role_otorization_trust'
        ]);

        DB::table('roles')->insert([
            'name'=>'role_otorization_finance'
        ]);
    }
}
