<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataSensor;

class DataSensorSeeder extends Seeder
{
    public function run()
    {
        DataSensor::create([
            'id' => 1,
            'kelas_id' => 1,
            'humidity' => 0,
            'projector' => 0,
            'temperature' => 0,
            'time' => '07:00:00',
            'date' => '2021-12-06',
        ]);
    }
}

?>