<?php

namespace App\Http\Controllers\kaprodi;

use App\Models\Prodi;
use App\Models\Surat;
use App\Models\Mahasiswa;
use App\Models\MahasiswaSurat;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class Home1Controller extends Controller
{
    public function index()
    { //
        $userProdiId = auth()->user()->prodi_id;

        $dataProdi = Prodi::withCount('mahasiswa')->where('id', $userProdiId)->get();
        $mahasiswaSuratCounts = MahasiswaSurat::join('mahasiswas', 'mahasiswa_surat.mahasiswa_id', '=', 'mahasiswas.id')
            ->join('prodis', 'mahasiswas.prodi_id', '=', 'prodis.id')
            ->where('prodis.id', $userProdiId)
            ->count();

        $mahasiswaBelumMendaftarCounts = Mahasiswa::whereNotIn('id', function ($query) {
            $query->select('mahasiswa_id')->from('mahasiswa_surat');
        })->where('prodi_id', $userProdiId)
            ->count();

        $suratPerProdiCounts = MahasiswaSurat::join('mahasiswas', 'mahasiswa_surat.mahasiswa_id', '=', 'mahasiswas.id')
            ->join('prodis', 'mahasiswas.prodi_id', '=', 'prodis.id')
            ->where('prodis.id', $userProdiId)
            ->groupBy('prodis.id', 'prodis.nama_prodi')
            ->select('prodis.nama_prodi', DB::raw('count(*) as total_surat'))
            ->get();

        $suratDisetujuiCounts = Surat::where('prodi_id', $userProdiId)
            ->where('status_surat_prodi', 'Di Setujui')
            ->count();

        $suratBelumDisetujuiCounts = Surat::where('prodi_id', $userProdiId)
            ->where('status_surat_prodi', 'Pending')
            ->count();

        return view('kaprodi.dashboard', compact(
            'dataProdi',
            'mahasiswaSuratCounts',
            'mahasiswaBelumMendaftarCounts',
            'suratPerProdiCounts',
            'suratDisetujuiCounts',
            'suratBelumDisetujuiCounts'
        ));
    }
}
