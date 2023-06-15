<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Surat extends Model
{
    use HasFactory;
    protected $dates = [
        'created_at',
        'updated_at'

    ];
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class)->as('mahasiswa');
    }

    public function prodis()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
    public function wadir()
    {
        return $this->belongsTo(Wadir::class, 'wadir_id');
    }
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
            ->format('d M Y');
    }
    public function getTanggalMulaiAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_mulai'])
            ->translatedFormat('d F Y');
    }

    public function getTanggalSelesaiAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_selesai'])
            ->translatedFormat('d F Y');
    }
}
