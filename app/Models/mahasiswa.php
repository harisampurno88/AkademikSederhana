<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mahasiswa extends Model
{
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    public $timestamps = false;

    protected $fillable = [
        'id_mahasiswa',
        'nama',
        'nim',
        'jurusan',
    ];

    public function nilai()
    {
        return $this->hasMany(nilai::class, 'id_mahasiswa', 'id_mahasiswa');
    }
}
