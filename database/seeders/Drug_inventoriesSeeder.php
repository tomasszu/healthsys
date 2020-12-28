<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Drug_inventoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drug_inventories')->insert([
        	'pharmacist_id' => 1,
        	'drug_id' => 1,
        	'count' => 3
        ]);
        DB::table('drug_inventories')->insert([
        	'pharmacist_id' => 1,
        	'drug_id' => 2,
        	'count' => 6
        ]);
        DB::table('drug_inventories')->insert([
        	'pharmacist_id' => 1,
        	'drug_id' => 3,
        	'count' => 1
        ]);
        DB::table('drug_inventories')->insert([
        	'pharmacist_id' => 1,
        	'drug_id' => 4,
        	'count' => 1
        ]);
        DB::table('drug_inventories')->insert([
        	'pharmacist_id' => 1,
        	'drug_id' => 5,
        	'count' => 5
        ]);
        DB::table('drug_inventories')->insert([
        	'pharmacist_id' => 2,
        	'drug_id' => 5,
        	'count' => 7
        ]);
        DB::table('drug_inventories')->insert([
        	'pharmacist_id' => 2,
        	'drug_id' => 1,
        	'count' => 3
        ]);
        DB::table('drug_inventories')->insert([
        	'pharmacist_id' => 2,
        	'drug_id' => 4,
        	'count' => 1
        ]);
    }
}
