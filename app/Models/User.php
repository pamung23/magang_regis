<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }
    public function scopeAkademik($query)
    {
        return $query->where('role', 'akademik');
    }

    public function scopeKaprodi($query)
    {
        return $query->where('role', 'kaprodi');
    }
    // public function updateLastLogin()
    // {
    //     $this->last_login_at = Carbon::now();
    //     $this->save();
    // }

    // public function updateLastLogout()
    // {
    //     $this->last_logout_at = Carbon::now();
    //     $this->save();
    // }
}
