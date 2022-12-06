<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataObject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kelas_id',
        'ac_high',
        'ac_medium',
        'active',
        'door_lock',
        'electricity',
        'lamp_1',
        'lamp_2',
        'lcd',
        'pc',
    ];

    protected $hidden = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
