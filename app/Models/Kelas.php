<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'desc',
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
}
