<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PharmacistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pharmacists')->insert([
        	'id' => 1,
        	'user_id' => 15,
            'pharmacy_name' => 'A. Pannas aptieka',
            'info' => 'Juglas iela 2, Rīga |

67520696 |

P-Pk 08-20 
S 09-15
Sv Slēgts'
        ]);
        DB::table('pharmacists')->insert([
        	'id' => 2,
        	'user_id' => 23,
            'pharmacy_name' => 'A. Zivtiņas aptieka',
            'info' => 'Malienas iela 4, Rīga |

67520696 |

P-Pk 08-20 
S 09-15
Sv Slēgts'
        ]);
    }
}
