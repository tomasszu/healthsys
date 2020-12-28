<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DrugsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('drugs')->insert([
        	'id' => 1,
            'name' => 'HEDELIX SĪRUPS 100ML',
            'producer' => 'Otsuka Pharmaceutical',
            'description' => 'Lieto elpceļu iekaisumu, hronisku bronhu slimību simptomātiskai ārstēšanai. Lietošana: pieaugušie un pusaudži- pa 1 mērkarotei (5 ml) sīrupa trīs reizes dienā; bērni no 4-10 gadiem- pa ½ mērkarotei (2,5 ml) sīrupa četras reizes dienā; bērni no 1-4 gadiem: pa ½ mērkarotei (2,5 ml) sīrupa trīs reizes dienā; bērni no 0-1 gadam: pa ½ mērkarotei (2,5 ml) sīrupa vienu reizi dienā.'
        ]);
        DB::table('drugs')->insert([
        	'id' => 2,
            'name' => 'SINUPRET APV.TABLETES N100',
            'producer' => 'Bionorica SE',
            'description' => 'Sinupret® tabletes lieto sekojošos gadījumos:
• akūti un hroniski deguna blakusdobumu iekaisumi
• akūti un hroniski elpceļu iekaisumi
• kā papildu līdzekli antibakteriālai terapijai'
        ]);
        DB::table('drugs')->insert([
        	'id' => 3,
            'name' => 'IBUPROFEN-LANNACHER 400MG TABLETES N30',
            'producer' => 'G.L. Pharma GmbH',
            'description' => 'Ibuprofēns mazina sāpes, pazemina temperatūru un samazina iekaisumu. Lietošana: pa ½ līdz 1 tabletei 3 reizes dienā.'
        ]);
        DB::table('drugs')->insert([
        	'id' => 4,
            'name' => 'CO-CODAMOL 500MG/8MG TABLETES N20',
            'producer' => 'Actavis Group PTC ehf.',
            'description' => 'Lieto simptomātiskai akūtu, vidēji stipru sāpju īstermiņa (līdz 3 dienām) ārstēšanai. Lietošana: 1 – 2 tabletes, ko var lietot ik pēc 4 – 6 stundām. 24 stundu laikā nedrīkst lietot vairāk kā 8 tabletes.'
        ]);
        DB::table('drugs')->insert([
        	'id' => 5,
            'name' => 'BALDRIĀNA TĒJA 50G (RFF)',
            'producer' => 'Rīgas Farmaceitiskā fabrika',
            'description' => 'Sen zināms, ka baldriāns ir augs, kas palīdz novērst nemieru un nervu spriedzi stresa situācijās, uzlabo miega kvalitāti, veicina žults un gremošanas orgānu sekrēciju.'
        ]);
    }
}
