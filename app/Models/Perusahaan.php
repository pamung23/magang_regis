<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaans';
    protected $fillable =
    [
        'nama_perusahaan',
        'alamat_perusahaan',
        'kota_kecamatan',
        'email',
        'no_perusahaan',
        'no_telpn_contact_person',
    ];
}
