<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    public function run()
    {
        Kelas::create([
            'id' => 1,
            'name' => 'kelas 1',
            'desc' => 'kelas 1',
            'ac_high' => 30,
            'ac_medium' => 15,
            'active' => '07:00:00',
            'door_lock' => '0',
            'electricity' => '0',
            'lamp_1' => '0',
            'lamp_2' => '0',
            'lcd' => '0',
            'pc' => '0',
            'created_at' => '2021-12-06 13:53:50',
            'updated_at' => '2021-12-06 13:53:50',
        ]);

        Kelas::create([
            'id' => 2,
            'name' => 'kelas 2',
            'desc' => 'kelas 2',
            'ac_high' => 30,
            'ac_medium' => 15,
            'active' => '07:00:00',
            'door_lock' => '0',
            'electricity' => '0',
            'lamp_1' => '0',
            'lamp_2' => '0',
            'lcd' => '0',
            'pc' => '0',
            'created_at' => '2021-12-06 13:53:50',
            'updated_at' => '2021-12-06 13:53:50',
        ]);

        Kelas::create([
            'id' => 3,
            'name' => 'kelas 3',
            'desc' => 'kelas 3',
            'ac_high' => 30,
            'ac_medium' => 15,
            'active' => '07:00:00',
            'door_lock' => '0',
            'electricity' => '0',
            'lamp_1' => '0',
            'lamp_2' => '0',
            'lcd' => '0',
            'pc' => '0',
            'created_at' => '2021-12-06 13:53:50',
            'updated_at' => '2021-12-06 13:53:50',
        ]);
    }
}
?>