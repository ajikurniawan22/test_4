<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'jabatan';
    protected $fillable = [
        'nama_jabatan',
        'id_level'
    ];

}
