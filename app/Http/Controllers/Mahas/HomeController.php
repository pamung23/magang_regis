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
    { //
        $mahasiswa = auth()->guard('mahasiswa')->user();

        // Ambil data surat terbaru untuk mahasiswa tertentu
        $suratTerbaru = $mahasiswa->surats->last();

        return view('mahasiswa.home', compact('mahasiswa', 'suratTerbaru'));
    }
}
