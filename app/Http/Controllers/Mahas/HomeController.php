<?php

namespace App\Http\Controllers\Mahas;


// use App\Models\Mahasiswa;
use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\MahasiswaSurat;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $mahasiswa = auth()->guard('mahasiswa')->user();
        $mahasiswaSurat = MahasiswaSurat::where('mahasiswa_id', $mahasiswa->id)->orderByDesc('created_at')->first();

        if ($mahasiswaSurat) {
            $surat = $mahasiswaSurat->surat;
            $mahasiswa = $mahasiswaSurat->mahasiswa;
        } else {
            $surat = null;
        }

        return view('mahasiswa.home', compact('mahasiswa', 'surat'));
    }
}
