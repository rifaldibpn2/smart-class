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
            'humidity' => 50,
            'projector' => 0,
            'temperature' => 30,
            'time' => '07:00:00',
            'date' => '2021-12-06',
        ]);

        DataSensor::create([
            'id' => 2,
            'kelas_id' => 2,
            'humidity' => 50,
            'projector' => 0,
            'temperature' => 30,
            'time' => '07:00:00',
            'date' => '2021-12-06',
        ]);

        DataSensor::create([
            'id' => 3,
            'kelas_id' => 3,
            'humidity' => 50,
            'projector' => 0,
            'temperature' => 30,
            'time' => '07:00:00',
            'date' => '2021-12-06',
        ]);
    }
}

?>