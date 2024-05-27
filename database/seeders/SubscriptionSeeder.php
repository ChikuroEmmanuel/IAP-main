<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubscriptionSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('subscription')->insert([
            [
                'user_id' => 3,
                'plan' => 'monthly',
                'expires_at' => now()->addMonth(),
            ],
            
        ]);
    }
}