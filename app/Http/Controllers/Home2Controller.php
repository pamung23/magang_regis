<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Surat;
use Illuminate\Support\Facades\DB;

class Home2Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __invoke()
    {
        // Mengambil total surat magang per prodi yang sudah 'Di Setujui'
        $suratPerProdiCounts = DB::table('surats')
            ->join('prodis', 'surats.prodi_id', '=', 'prodis.id')
            ->select('prodis.nama_prodi', DB::raw('count(*) as total_surat'))
            ->where('surats.status_surat_prodi', 'Di Setujui')
            ->groupBy('prodis.nama_prodi')
            ->get();

        // Mengambil data surat per prodi yang sudah 'Di Setujui'
        $suratPerProdiData = [];
        foreach ($suratPerProdiCounts as $count) {
            $prodi = $count->nama_prodi;
            $surat = Surat::where('prodi_id', $prodi)
                ->where('status_surat_prodi', 'Di Setujui')
                ->get();
            $suratPerProdiData[$prodi] = $surat;
        }

        // Mengambil total surat yang sudah diprint per prodi
        $printedSuratCounts = DB::table('surats')
            ->join('prodis', 'surats.prodi_id', '=', 'prodis.id')
            ->select('prodis.nama_prodi', DB::raw('count(*) as total_printed_surat'))
            ->where('surats.status_surat_akademik', 'Sudah Di Print')
            ->groupBy('prodis.nama_prodi')
            ->get();

        // Mengambil total surat yang belum diprint per prodi
        $unprintedSuratCounts = DB::table('surats')
            ->join('prodis', 'surats.prodi_id', '=', 'prodis.id')
            ->select('prodis.nama_prodi', DB::raw('count(*) as total_unprinted_surat'))
            ->where('surats.status_surat_akademik', 'Pending')
            ->groupBy('prodis.nama_prodi')
            ->get();

        // Menggabungkan data surat yang sudah diprint dan belum diprint per prodi
        $suratCounts = [];
        foreach ($printedSuratCounts as $printedSurat) {
            $prodi = $printedSurat->nama_prodi;
            $suratCounts[$prodi]['printed'] = $printedSurat->total_printed_surat;
        }
        foreach ($unprintedSuratCounts as $unprintedSurat) {
            $prodi = $unprintedSurat->nama_prodi;
            $suratCounts[$prodi]['unprinted'] = $unprintedSurat->total_unprinted_surat;
        }

        return view('admin.dashboard', compact('suratPerProdiCounts', 'suratPerProdiData', 'suratCounts'));
    }
}
