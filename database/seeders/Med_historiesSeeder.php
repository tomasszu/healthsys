<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Med_historiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('med_histories')->insert([
        	'patient_id' => 11,
            'diagnosis' => '',
            'description' => 'Veikta vakcinācija pret Poliomielītu',
            'created_at' => '1993-10-15'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 11,
            'diagnosis' => 'B03 Bakas',
            'description' => 'Bērnudārzā saķertas bakas no cita bērna. Rekomendācijas : mājas režīms.
Pagaidām komplikāciju nav.',
            'created_at' => '1995-02-15'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 11,
            'diagnosis' => 'B01 Varicella [vējbakas]',
            'description' => 'Normāla slimības gaita.
Aprūpe pediatrijas prakses ietvaros.
Inficēšanās bērnudārzā',
            'created_at' => '1996-10-15'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 11,
            'diagnosis' => 'B01.2	Vējbaku pneimonija (J17.1*)',
            'description' => 'Slimības gaita ir saasinājusies. Notiek ārstniecība un rehabilitācija bērnu klīniskās universitātes slimnīcas stacionārā.
Temperatūra 39.9',
            'created_at' => '1996-10-20'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 12,
            'diagnosis' => '',
            'description' => 'Veikta vakcinācija pret Poliomielītu',
            'created_at' => '1989-10-15'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 12,
            'diagnosis' => 'B03 Bakas',
            'description' => 'Bērnudārzā saķertas bakas no cita bērna. Rekomendācijas : mājas režīms.
Pagaidām komplikāciju nav.',
            'created_at' => '1991-10-15'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 12,
            'diagnosis' => 'B01 Varicella [vējbakas]',
            'description' => 'Normāla slimības gaita.
Aprūpe pediatrijas prakses ietvaros.
Inficēšanās bērnudārzā',
            'created_at' => '1993-01-15'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 13,
            'diagnosis' => '',
            'description' => 'Veikta vakcinācija pret Poliomielītu',
            'created_at' => '1981-10-15'
        ]);

        DB::table('med_histories')->insert([
        	'patient_id' => 13,
            'diagnosis' => 'B03 Bakas',
            'description' => 'Bērnudārzā saķertas bakas no cita bērna. Rekomendācijas : mājas režīms.
Pagaidām komplikāciju nav.',
            'created_at' => '1984-08-18'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 13,
            'diagnosis' => 'B01 Varicella [vējbakas]',
            'description' => 'Normāla slimības gaita.
Aprūpe pediatrijas prakses ietvaros.
Inficēšanās bērnudārzā',
            'created_at' => '1985-10-15'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 13,
            'diagnosis' => 'B60	Citas citur neklasificētas vienšūņu ierosinātas slimības',
            'description' => 'Kontrolēta infekcijas gaita. Inficēšanās netīŗa dzeramā ūdens dēļ. Tiek lietotas antibakteriālās zāles.',
            'created_at' => '1998-12-15'
        ]);

        DB::table('med_histories')->insert([
        	'patient_id' => 13,
            'diagnosis' => 'E55 D vitamīna trūkums',
            'description' => 'D vitamīna trūkums. Rekomendētēts D vitamīna kurss 2 mēn.',
            'created_at' => '2005-09-10'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 14,
            'diagnosis' => '',
            'description' => 'Veikta vakcinācija pret Poliomielītu',
            'created_at' => '1984-10-15'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 14,
            'diagnosis' => 'B03 Bakas',
            'description' => 'Bērnudārzā saķertas bakas no cita bērna. Rekomendācijas : mājas režīms.
Pagaidām komplikāciju nav.',
            'created_at' => '1988-07-15'
        ]);

        DB::table('med_histories')->insert([
        	'patient_id' => 14,
            'diagnosis' => 'B01 Varicella [vējbakas]',
            'description' => 'Normāla slimības gaita.
Aprūpe pediatrijas prakses ietvaros.
Inficēšanās bērnudārzā',
            'created_at' => '1989-10-15'
        ]);

        DB::table('med_histories')->insert([
        	'patient_id' => 14,
            'diagnosis' => 'B01.2	Vējbaku pneimonija (J17.1*)',
            'description' => 'Slimības gaita ir saasinājusies. Notiek ārstniecība un rehabilitācija bērnu klīniskās universitātes slimnīcas stacionārā.
Temperatūra 39.9',
            'created_at' => '1989-10-20'
        ]);

        DB::table('med_histories')->insert([
        	'patient_id' => 14,
            'diagnosis' => 'B60	Citas citur neklasificētas vienšūņu ierosinātas slimības',
            'description' => 'Kontrolēta infekcijas gaita. Inficēšanās netīŗa dzeramā ūdens dēļ. Tiek lietotas antibakteriālās zāles.',
            'created_at' => '1996-10-02'
        ]);
        DB::table('med_histories')->insert([
        	'patient_id' => 14,
            'diagnosis' => 'E55 D vitamīna trūkums',
            'description' => 'D vitamīna trūkums. Rekomendētēts D vitamīna kurss 2 mēn.',
            'created_at' => '2009-11-15'
        ]);
    }
}
