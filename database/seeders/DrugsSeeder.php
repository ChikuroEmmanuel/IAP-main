<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrugsSeeder extends Seeder
{
   
    public function run(): void
    {
        DB::table("drugs")->insert([
            ['name' => 'Paracetamol', 'description' => 'Paracetamol is a painkiller used to relieve mild to moderate pain and fever. It is often recommended as one of the first treatments for pain, as it','quantity'=> 10, 'category_id' => 1],
            ['name' => 'Ibuprofen', 'description' => 'Ibuprofen is a painkiller available over the counter without a prescription. It\'s one of a group of painkillers called non-steroidal anti-inflammatory drugs ','quantity'=> 10, 'category_id' => 2],
            ['name' => 'Aspirin', 'description' => 'Aspirin is a common pain reliever that was originally derived from the bark of willow trees. It is also an anti-inflammatory and a blood thinner, which makes it useful in preventing blood clots that can cause heart attacks and strokes.','quantity'=> 10, 'category_id' => 2],
            ['name' => 'Codeine', 'description' => 'Codeine is a painkiller. It\'s used to treat pain, for example after an operation or an injury. It\'s also used for long-standing pain when everyday painkillers, such as aspirin, ibuprofen and paracetamol, haven\'t worked.', 'quantity'=> 10,'category_id' => 3],
            ['name' => 'Morphine', 'description' => 'Morphine is a pain medication of the opiate family which is found naturally in a number of plants and animals. ', 'quantity'=> 10,'category_id' => 3],
            ['name' => 'Tramadol', 'description' => 'Tramadol is a narcotic-like pain relieving oral medicine that is used as a treatment for moderate to severe pain in adults. The extended-release-tablet formulation of this drug is used to treat moderate to severe chronic pain when treatment is needed around the clock.','quantity'=> 10, 'category_id' => 4],
            ['name' => 'Diclofenac', 'description' => 'Diclofenac is a medicine that reduces inflammation and pain. It\'s used to treat aches and pains, as well as problems with joints, muscles and bones. These include: rheumatoid arthritis, osteoarthritis and gout.','quantity'=> 10, 'category_id' => 4],
            ['name' => 'Naproxen', 'description' => 'Naproxen is a medicine that reduces inflammation and pain in joints and muscles. It\'s used to treat diseases of joints, such as rheumatoid arthritis, osteoarthritis and gout. It\'s also used for period pain and muscle and bone disorders','quantity'=> 10, 'category_id' => 5]
                         
        ]);
    }
}
