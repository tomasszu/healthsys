<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Doctor_classSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_classes')->insert([
        	'id' => 1,
            'name' => 'Ģimenes ārsts',
        ]);
        DB::table('doctor_classes')->insert([
            'id' => 2,
            'name' => 'Otorinolaringologs',
        ]);
        DB::table('doctor_classes')->insert([
            'id' => 3,
            'name' => 'Dermatologs-venerologs',
        ]);
        DB::table('doctor_classes')->insert([
            'id' => 4,
            'name' => 'Gastroenterologs',
        ]);
        DB::table('doctor_classes')->insert([
            'id' => 5,
            'name' => 'Infektologs',
        ]);
        DB::table('doctor_classes')->insert([
            'id' => 6,
            'name' => 'Kardiologs',
        ]);
        DB::table('doctor_classes')->insert([
            'id' => 7,
            'name' => 'Ķirurgs',
        ]);
        DB::table('doctor_classes')->insert([
            'id' => 8,
            'name' => 'Neirologs',
        ]);
        
    }
}
