<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 

class Drug_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('drug_category')->insert([
        ['name' => 'Painkiller'],
        ['name' => 'Antibiotics'],
        ['name' => 'Antidepressant'],
        ['name' => 'Antihistamine'],
        ['name' => 'Antiviral'],
        ['name' => 'Antifungal'],
        ['name' => 'Antibacterial'],
        ['name' => 'Anticonvulsant'],
        ['name' => 'Antiemetic'],
        ['name' => 'Antidiarrheal'],
        ['name' => 'Antiseptic'],
        ['name' => 'Antitussive'],
        ['name' => 'Bronchodilator'],
        ['name' => 'Decongestant'],
        ['name' => 'Diuretic'],
        ['name' => 'Expectorant'],
        ['name' => 'Laxative'],
        ['name' => 'Muscle Relaxant'],
        ]);
}
}