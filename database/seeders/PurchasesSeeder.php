<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurchasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('purchases')->insert([
            ['users_id' => 3,'drugs_id' => 1],
            ['users_id' => 3, 'drugs_id' => 2],
            ['users_id' => 3, 'drugs_id' => 3],
      
          
        ]);
    }
}