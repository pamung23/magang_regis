<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class SuratMahasiswa extends Pivot
{
    use HasFactory;
    protected $table = 'mahasiswa_surat';

    protected $fillable = [
        'mahasiswa_id', 'surat_id',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}
