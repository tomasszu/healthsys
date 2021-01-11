<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctors')->insert([
        	'id' => 1,
        	'user_id' => 13,
            'doctor_class' => 5,
            'practice_name' => 'Pētera Kļaviņa infektologa prakse',
            'info' => 'Specializējas infekcijas slimībās, to izcelsmēs un ārstēšanā |Biķernieku iela 220 |tel. 27898660'
        ]);
        DB::table('doctors')->insert([
        	'id' => 2,
        	'user_id' => 14,
            'doctor_class' => 1,
            'practice_name' => 'Dr. Liepiņa ģimenes ārsta prakse',
            'info' => 'Specializējas vispārējā veslības aprūpē un pediatrijā |Brīvības iela 114 |tel. 27898975'
        ]);
        DB::table('doctors')->insert([
        	'id' => 3,
        	'user_id' => 16,
            'doctor_class' => 2,
            'practice_name' => 'Anastasijas Ābolas otorinolaringologa prakse',
            'info' => 'Specializējas deguna, rīkles, aizdegunes un ausu slimību diagnostikā un ārstēšanā. | T.  +371 67576333 | Adrese: Aizkraukles iela 68/1'
        ]);
        DB::table('doctors')->insert([
        	'id' => 4,
        	'user_id' => 19,
            'doctor_class' => 2,
            'practice_name' => 'Alekseja Nurminska otorinolaringologa prakse',
            'info' => 'Specializējas deguna, rīkles, aizdegunes un ausu slimību diagnostikā un ārstēšanā. | T.  +371 67576255 | Adrese: Lielvārdes iela 68/1'
        ]);
        DB::table('doctors')->insert([
        	'id' => 5,
        	'user_id' => 20,
            'doctor_class' => 2,
            'practice_name' => 'Patrika Ozola otorinolaringologa prakse',
            'info' => 'Specializējas deguna, rīkles, aizdegunes un ausu slimību diagnostikā un ārstēšanā. | T.  +371 67578777 | Adrese: Brīvības iela 119'
        ]);
        DB::table('doctors')->insert([
        	'id' => 6,
        	'user_id' => 21,
            'doctor_class' => 3,
            'practice_name' => 'Ņikitas Bumbiera dermatologa-venerologa prakse',
            'info' => 'Specializējas dažādu ādas slimību diagnostikā un ārstēšanā | T.  +371 67576255 | Adrese: Lielvārdes iela 68/1'
        ]);
        DB::table('doctors')->insert([
        	'id' => 7,
        	'user_id' => 22,
            'doctor_class' => 4,
            'practice_name' => 'Valērijas Burkānas gastroenterologa prakse',
            'info' => 'Veic kuņģa-zarnu trakta darbības patoloģiju, kā arī akūtu un hronisku gremošanas orgānu slimību diagnostiku un ārstēšanu | T.  +371 67576255 | Adrese: Lielvārdes iela 68/1'
        ]);
        DB::table('doctors')->insert([
        	'id' => 8,
        	'user_id' => 24,
            'doctor_class' => 8,
            'practice_name' => 'Margaritas Svetovas neirologa prakse',
            'info' => 'Specializējas Epilepsijā, Atmiņas traucējumos, neirodeģeneratīvajās slimībās, Kustību traucējumos, sāpēs , sklerozē. | T.  +371 67576255 | Adrese: Lielvārdes iela 68/1'
        ]);
        DB::table('doctors')->insert([
        	'id' => 9,
        	'user_id' => 25,
            'doctor_class' => 1,
            'practice_name' => 'Dr. Ikala ģimenes ārsta prakse',
            'info' => 'Specializējas vispārējā veslības aprūpē un pediatrijā |Matīsa iela 19 |tel. 29998212'
        ]);

    }
}
