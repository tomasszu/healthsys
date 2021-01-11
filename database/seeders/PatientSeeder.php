<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patients')->insert([
        	'id' => 11,
            'user_id' => 11,
            'family_doctor_id' => 2,
            'age' => '27',
            'contacts' => 'tel. 22556644 /n e-pasts. berzins@gmail.com',
            'address' => 'Brivibas 29, Rīga'
        ]);
        DB::table('patients')->insert([
        	'id' => 12,
            'user_id' => 12,
            'family_doctor_id' => 2,
            'age' => '32',
            'contacts' => 'tel. 22556688 /n e-pasts. janis@gmail.com',
            'address' => 'Brivibas 29, Rīga'
        ]);
        DB::table('patients')->insert([
        	'id' => 13,
            'user_id' => 17,
            'family_doctor_id' => 9,
            'age' => '40',
            'contacts' => 'tel. 22556333 /n e-pasts. zarins@gmail.com',
            'address' => 'Andrejsalas 3, Rīga'
        ]);
        DB::table('patients')->insert([
        	'id' => 14,
            'user_id' => 18,
            'family_doctor_id' => 9,
            'age' => '37',
            'contacts' => 'tel. 27851644 /n e-pasts. krumina@gmail.com',
            'address' => 'Biķernieku 15, Rīga'
        ]);
    }
}
