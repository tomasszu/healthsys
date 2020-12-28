<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
        	'message' => 'Lūdzu nāciet vakcinēties pret Difteriju!',
            'from_user' => 14,
            'for_user' => 11,
            'created_at' => '2020-10-15 16:00:00'
        ]);
        DB::table('messages')->insert([
        	'message' => 'Labdien, esmu apslimis, domāju ka vakcinācija jāieplāno vēlāk.',
            'from_user' => 11,
            'for_user' => 14,
            'created_at' => '2020-10-16 16:00:00'
        ]);
        DB::table('messages')->insert([
        	'message' => 'Labdien, vai veiktie rentgenuzņēmumi deguna apvidum ir apmierinoši?',
            'from_user' => 12,
            'for_user' => 16,
            'created_at' => '2020-12-01 16:06:30'
        ]);
        DB::table('messages')->insert([
        	'message' => 'Labi, sarunāsim vēlāk!',
            'from_user' => 14,
            'for_user' => 11,
            'created_at' => '2020-10-18 16:06:30'
        ]);
        DB::table('messages')->insert([
        	'message' => 'Labdien, jūsu deguna apvidus rentgena izmeklējums ir apmierinošs. Nekādas pataloģijas nesaskatu.',
            'from_user' => 16,
            'for_user' => 12,
            'created_at' => '2020-12-04 16:06:30'
        ]);
        DB::table('messages')->insert([
        	'message' => 'Labdien! Vai man drīzumā ir jāieplāno ģimenes ārsta vizīte?',
            'from_user' => 17,
            'for_user' => 25,
            'created_at' => '2020-11-01 16:06:30'
        ]);
        DB::table('messages')->insert([
        	'message' => 'Labdien! Drīzumā jāieplāno vakcinācijas atjaunošana difterijai. Pilna asins aina arī sen nav taisīta. Lūdzu ieplānojiet laiku vizītei tuvākā mēneša laikā.',
            'from_user' => 25,
            'for_user' => 17,
            'created_at' => '2020-11-02 16:06:30'
        ]);
        DB::table('messages')->insert([
        	'message' => 'Labdien! Vai jūsu nosūtītās veiktās analīzes ir apmierinošas?',
            'from_user' => 18,
            'for_user' => 21,
            'created_at' => '2020-12-13 11:06:30'
        ]);
    }
}
