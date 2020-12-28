<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Doctor_notesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_notes')->insert([
        	'patient_id' => 11,
        	'reporting_doctor_id' => 2,
        	'recepient' => 2,
            'diagnosis' => 'R05 Klepus',
            'complications' => null,
            'recomendations' => 'Lūdzu lora konsultāciju',
            'regime' => 'Brivais rezims',
            'created_at' => '2020-10-15'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 11,
        	'reporting_doctor_id' => 3,
        	'recepient' => null,
            'diagnosis' => 'Alerģisks rinīts',
            'complications' => 'Deguna tūska. Hroniskas iesnas',
            'recomendations' => 'Lūdzu CT deguna dobumiem',
            'regime' => null,
            'created_at' => '2020-11-02'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 11,
        	'reporting_doctor_id' => 2,
        	'recepient' => 8,
            'diagnosis' => 'F43.8	Cita veida reakcija uz smagu stresu',
            'complications' => 'R55	Ģībonis un kolapss',
            'recomendations' => 'Lūdzu neiraloga konsultāciju',
            'regime' => null,
            'created_at' => '2020-12-15'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 12,
        	'reporting_doctor_id' => 2,
        	'recepient' => 2,
            'diagnosis' => 'R05 Klepus',
            'complications' => null,
            'recomendations' => 'Lūdzu lora konsultāciju',
            'regime' => 'Brivais rezims',
            'created_at' => '2020-09-15'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 12,
        	'reporting_doctor_id' => 3,
        	'recepient' => null,
            'diagnosis' => 'Alerģisks rinīts',
            'complications' => 'Deguna tūska. Hroniskas iesnas',
            'recomendations' => 'Lūdzu CT deguna dobumiem',
            'regime' => null,
            'created_at' => '2020-10-15'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 13,
        	'reporting_doctor_id' => 9,
        	'recepient' => 2,
            'diagnosis' => 'R05 Klepus',
            'complications' => null,
            'recomendations' => 'Lūdzu lora konsultāciju',
            'regime' => 'Brivais rezims',
            'created_at' => '2020-10-10'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 13,
        	'reporting_doctor_id' => 9,
        	'recepient' => 2,
            'diagnosis' => 'R06.5	Elpošana caur muti',
            'complications' => null,
            'recomendations' => 'Lūdzu lor konsultāciju un novērošanu',
            'regime' => null,
            'created_at' => '2020-11-01'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 13,
        	'reporting_doctor_id' => 9,
        	'recepient' => 2,
            'diagnosis' => 'D14.4 Elpošanas sistēma, bez precizējuma',
            'complications' => 'R05 Klepus',
            'recomendations' => 'Lūdzu lor konsultāciju',
            'regime' => 'Brivais rezims',
            'created_at' => '2020-12-04'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 14,
        	'reporting_doctor_id' => 9,
        	'recepient' => 2,
            'diagnosis' => 'R05 Klepus',
            'complications' => null,
            'recomendations' => 'Lūdzu lora konsultāciju',
            'regime' => 'Brivais rezims',
            'created_at' => '2020-09-13'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 14,
        	'reporting_doctor_id' => 3,
        	'recepient' => null,
            'diagnosis' => 'Alerģisks rinīts',
            'complications' => 'Deguna tūska. Hroniskas iesnas',
            'recomendations' => 'Lūdzu CT deguna dobumiem',
            'regime' => null,
            'created_at' => '2020-10-01'
        ]);
        DB::table('doctor_notes')->insert([
        	'patient_id' => 14,
        	'reporting_doctor_id' => 9,
        	'recepient' => 5,
            'diagnosis' => 'B97.2	Koronavīrusi kā citās nodaļās klasificētu slimību ierosinātāji',
            'complications' => 'R05 Klepus',
            'recomendations' => 'Lūdzu infektologa novērošanu',
            'regime' => 'Majas rezims',
            'created_at' => '2020-11-02'
        ]);        
    }
}
