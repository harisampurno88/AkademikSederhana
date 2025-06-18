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

    public function dosen()
    {
        return $this->belongsTo(dosen::class, 'id_dosen', 'id_dosen');
    }

    public function nilai()
    {
        return $this->hasMany(nilai::class, 'id_mk', 'id_mk');
    }

}
