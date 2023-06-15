<?php

namespace App\Http\Controllers\kaprodi;

use App\Models\Prodi;
use App\Models\Surat;
use App\Models\Wadir;
use App\Models\Mahasiswa;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class SuratkapController extends Controller
{
    public function index()
    {
        $prodi_id = auth()->user()->prodi_id;

        // Mendapatkan data mahasiswa berdasarkan prodi
        $mahasiswas = Mahasiswa::where('prodi_id', $prodi_id)->get();

        // Mendapatkan data wadir, perusahaan, dan surat
        $wadir = Wadir::all();
        $perusahaan = Perusahaan::all();
        $surat = Surat::where('prodi_id', $prodi_id)->orderByDesc('created_at')->get();

        return view('kaprodi.suratkap.index', compact('mahasiswas', 'wadir', 'perusahaan', 'surat'));
    }

    public function setuju(Request $request, $id)
    {
        $item = Surat::findOrFail($id);
        $item->update([
            'status_surat_prodi' => 'Di Setujui'
        ]);;
        return redirect()->back()->with('success', 'Surat berhasil disetujui.');
    }
    public function tolak($id)
    {
        $item = Surat::findOrFail($id);
        $item->update([
            'status_surat_prodi' => 'Di Tolak'
        ]);
        return redirect()->back()->with('success', 'Surat berhasil disetujui.');
    }
}
