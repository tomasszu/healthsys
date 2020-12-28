<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            Doctor_classSeeder::class,
            DoctorSeeder::class,
            PatientSeeder::class,
            Med_historiesSeeder::class,
        	Doctor_notesSeeder::class,
        	DrugsSeeder::class,
        	Patient_drugsSeeder::class,
        	PharmacistsSeeder::class,
        	Drug_inventoriesSeeder::class,
        	MessagesSeeder::class
        ]);
    }
}
