<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('statuses')->insert([
            ['name' => 'Active',
            'status_id' => '1',
            'created_at' => Carbon::now(),],
            ['name' => 'Inactive',
            'status_id' => '0',
            'created_at' => Carbon::now(),]

        ]);
    }
}
