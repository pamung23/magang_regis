<?php

namespace App\Models;

use App\Enum\MahasiswaStatusEnum;
use Appp\Enum\MahasiswaStatusEnum as EnumMahasiswaStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;
    protected $guard = 'mahasiswa';
    protected $guarded = [];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($mahasiswa) {
            // Menggunakan nim sebagai password
            $mahasiswa->password = Hash::make($mahasiswa->nim);
        });
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function surats()
    {
        return $this->belongsToMany(Surat::class, 'mahasiswa_surat', 'mahasiswa_id', 'surat_id');
    }
    public function scopeByProdi($query, $prodiId)
    {
        return $query->where('prodi_id', $prodiId);
    }
}
