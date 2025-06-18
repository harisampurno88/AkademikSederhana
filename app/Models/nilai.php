<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'id_nilai';
    public $timestamps = false;

    protected $fillable = [
        'id_nilai',
        'id_mahasiswa',
        'id_mk',
        'nilai_quiz',
        'nilai_uts',
        'nilai_uas'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mahasiswa' , 'id_mahasiswa');
    }

    public function matakuliah()
    {
        return $this->belongsTo(matakuliah::class, 'id_mk' , 'id_mk');
    }
}
