<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class);
    }
    public function surat()
    {
        return $this->hasMany(Surat::class, 'prodi_id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class, 'prodi_id');
    }
}
