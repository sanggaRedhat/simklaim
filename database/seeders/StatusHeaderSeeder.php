<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusHeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status_headers')->insert(
            ['nama'=>'draft'],
        );
        DB::table('status_headers')->insert(
            ['nama'=>'pending'],
        );
        DB::table('status_headers')->insert(
            ['nama'=>'released'],
        );
    }
}
