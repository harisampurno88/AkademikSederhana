<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $table = 'dosen';
    protected $primaryKey = 'id_dosen';
    public $timestamps = false;

    protected $fillable = [
        'id_dosen',
        'nama_dosen',
        'nip',
    ];

    public function matakuliah()
    {
        return $this->hasMany(matakuliah::class, 'id_dosen', 'id_dosen');
    }
}
