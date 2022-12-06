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
        'room',
        'temperature',
        'time',
    ];

    protected $hidden = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
