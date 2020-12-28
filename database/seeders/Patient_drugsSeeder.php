<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Patient_drugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patient_drugs')->insert([
        	'patient_id' => 11,
        	'doctor_id' => 2,
        	'drug_id' => 1,
        	'active' => 0,
            'created_at' => '2020-10-19'
        ]);
        DB::table('patient_drugs')->insert([
        	'patient_id' => 12,
        	'doctor_id' => 2,
        	'drug_id' => 4,
        	'active' => 1,
            'created_at' => '2020-10-15'
        ]);
        DB::table('patient_drugs')->insert([
        	'patient_id' => 13,
        	'doctor_id' => 9,
        	'drug_id' => 1,
        	'active' => 1,
            'created_at' => '2020-10-15'
        ]);
        DB::table('patient_drugs')->insert([
        	'patient_id' => 14,
        	'doctor_id' => 9,
        	'drug_id' => 2,
        	'active' => 0,
            'created_at' => '2020-09-15'
        ]);
        DB::table('patient_drugs')->insert([
        	'patient_id' => 11,
        	'doctor_id' => 9,
        	'drug_id' => 4,
        	'active' => 1,
            'created_at' => '2020-11-25'
        ]);
        DB::table('patient_drugs')->insert([
        	'patient_id' => 12,
        	'doctor_id' => 9,
        	'drug_id' => 5,
        	'active' => 1,
            'created_at' => '2020-11-20'
        ]);
        DB::table('patient_drugs')->insert([
        	'patient_id' => 13,
        	'doctor_id' => 9,
        	'drug_id' => 4,
        	'active' => 0,
            'created_at' => '2020-12-03'
        ]);
    }
}
