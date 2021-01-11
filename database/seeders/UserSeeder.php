<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'id' => 11,
            'name' => 'Andris Bērziņš',
            'pers_id' => '000000-00000',
            'user_class' => 1,
            'email' => 'berzins@gmail.com',
            'password' => bcrypt('parole')
        ]);

        DB::table('users')->insert([
            'id' => 12,
            'name' => 'Jānis Bērziņš',
            'pers_id' => '111111-11111',
            'user_class' => 1,
            'email' => 'janis@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 13,
            'name' => 'Peteris Kļaviņš',
            'pers_id' => '222222-22222',
            'user_class' => 2,
            'email' => 'klavins@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 14,
            'name' => 'Artūrs Liepiņš',
            'pers_id' => '333333-33333',
            'user_class' => 2,
            'email' => 'liepins@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 15,
            'name' => 'Anna Panna',
            'pers_id' => '444444-44444',
            'user_class' => 3,
            'email' => 'panna@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 16,
            'name' => 'Anastasija Ābola',
            'pers_id' => '555555-55555',
            'user_class' => 2,
            'email' => 'abola@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 17,
            'name' => 'Tomass Zariņš',
            'pers_id' => '666666-66666',
            'user_class' => 1,
            'email' => 'zarins@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 18,
            'name' => 'Liene Krūmiņa',
            'pers_id' => '777777-77777',
            'user_class' => 1,
            'email' => 'krumina@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 19,
            'name' => 'Aleksejs Nurminskis',
            'pers_id' => '888888-88888',
            'user_class' => 2,
            'email' => 'nurminskis@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 20,
            'name' => 'Patriks Ozols',
            'pers_id' => '999999-99999',
            'user_class' => 2,
            'email' => 'ozols@gmail.com',
            'password' => bcrypt('parole')
        ]);

        DB::table('users')->insert([
            'id' => 21,
            'name' => 'Ņikita Bumbieris',
            'pers_id' => '011111-11111',
            'user_class' => 2,
            'email' => 'bumbieris@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 22,
            'name' => 'Valērija Burkāna',
            'pers_id' => '022222-22222',
            'user_class' => 2,
            'email' => 'burkana@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 23,
            'name' => 'Arta Zivtiņa',
            'pers_id' => '033333-33333',
            'user_class' => 3,
            'email' => 'zivtina@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 24,
            'name' => 'Margarita Svetova',
            'pers_id' => '044444-44444',
            'user_class' => 2,
            'email' => 'svetova@gmail.com',
            'password' => bcrypt('parole')
        ]);
        DB::table('users')->insert([
            'id' => 25,
            'name' => 'Raimonds Ikals',
            'pers_id' => '055555-55555',
            'user_class' => 2,
            'email' => 'ikals@gmail.com',
            'password' => bcrypt('parole')
        ]);
    }
}
