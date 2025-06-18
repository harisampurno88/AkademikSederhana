<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    protected $table = 'matakuliah';
    protected $primaryKey = 'id_mk';
    public $timestamps = false;
    protected $fillable = [
        'id_mk',
        'nama_mk',
        'sks',
        'id_dosen'
    ];

}
