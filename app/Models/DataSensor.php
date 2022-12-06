<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSensor extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kelas_id',
        'humidity',
        'projector',
        'temperature',
        'time',
        'date',
    ];
    
    protected $hidden = [];
}
