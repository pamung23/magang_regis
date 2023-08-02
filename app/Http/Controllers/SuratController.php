<?php

namespace App\Http\Controllers;

use DateTime;
// use PDF;
use Carbon\Carbon;
use App\Models\Prodi;
use App\Models\Surat;
use App\Models\Wadir;
use App\Helpers\Helper;
use App\Models\Mahasiswa;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controller;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::all();
        $wadirs = Wadir::all();
        $perusahaan = Perusahaan::all();
        $surat = Surat::where('status_surat_prodi', 'Di Setujui')
            ->where('created_at', '>=', now()->subWeek()) // Menampilkan surat yang dibuat dalam satu minggu terakhir
            ->with('prodis')
            ->get();
        return view('admin.surat.index', compact('wadirs', 'perusahaan', 'surat', 'mahasiswa'));
    }

    public function print($surat)
    {
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $wadir = Wadir::all();
        $perusahaan = Perusahaan::all();
        $surat = Surat::find($surat);
        $surat->status_surat_akademik = 'Sudah Di Print';
        $surat->save();
        // $tanggalMulai = new DateTime($surat->tanggal_mulai);
        // $tanggalSelesai = new DateTime($surat->tanggal_selesai);
        // $selisihBulan = $tanggalMulai->diff($tanggalSelesai)->m;
        $jumlahMahasiswa = $surat->mahasiswa()->count();
        $tanggalRealtime = now()->format('d M Y');
        $pdf = PDF::loadView('admin.surat.print', compact('surat', 'prodi', 'mahasiswa', 'wadir', 'perusahaan',  'jumlahMahasiswa', 'tanggalRealtime',))->setPaper('a4');
        return $pdf->stream("Surat - " . "$surat->nama" . ".pdf");
    }
    public function viewPDF($surat)
    {
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $wadir = Wadir::all();
        $perusahaan = Perusahaan::all();
        $surat = Surat::find($surat);

        // Render PDF view
        $pdf = PDF::loadView('admin.surat.view', compact('surat', 'prodi', 'mahasiswa', 'wadir', 'perusahaan'))->setPaper('a4');

        // Return the PDF as a response without downloading it
        return $pdf->stream();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = Prodi::all();
        $wadir = Wadir::all();
        $mahasiswa = Mahasiswa::where('status_daftar', '0')->get();
        $perusahaan = Perusahaan::all();
        return view('admin.surat.create', compact('wadir', 'perusahaan', 'mahasiswa', 'prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'prodi_id' => 'required',
            // 'status_surat_prodi' => 'required',
            'perusahaan_id' => 'required',
        ]);

        $tanggalMulai = Carbon::createFromFormat('d M Y', $request->tanggal_mulai)->format('Y-m-d');
        $tanggalSelesai = Carbon::createFromFormat('d M Y', $request->tanggal_selesai)->format('Y-m-d');

        $surat = Surat::create([
            'tanggal_mulai' => $tanggalMulai,
            'tanggal_selesai' => $tanggalSelesai,
            'perihal' => 'Magang Industri',
            // 'status_surat_prodi' => $request->status_surat_prodi = 'pending',
            'prodi_id' => $request->prodi_id,
            'perusahaan_id' => $request->perusahaan_id,
        ]);
        if ($request->has('mahasiswa')) {
            $surat->mahasiswa()->attach($request->mahasiswa);
        }
        return redirect()->route('surat.index')->with('success', 'Data Telah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit($surat)
    {
        $surat = Surat::findorfail($surat);
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $perusahaan = Perusahaan::all();
        return view('admin.surat.edit', compact('surat', 'prodi', 'perusahaan', 'mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'perihal' => 'required',
            'prodi_id' => 'required',
            'perusahaan_id' => 'required',
        ]);
        $surat = Surat::findorfail($id);
        $surat_data = [
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'perihal' => $request->perihal,
            'prodi_id' => $request->prodi_id,
            'perusahaan_id' => $request->perusahaan_id,
        ];
        if ($request->has('mahasiswa')) {
            $surat->mahasiswa()->sync($request->mahasiswa);
            $surat->update($surat_data);
        }
        return redirect()->route('surat.index')->with('success', 'Data Telah Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        $surat->mahasiswa()->detach();
        $surat->delete();
        return back();
    }
    public function setuju(Request $request, $id)
    {
        $item = Surat::findOrFail($id);
        $item->update([
            'status_surat_akademik2' => 'Di Setujui'
        ]);;
        return redirect()->back()->with('success', 'Surat berhasil disetujui.');
    }
    public function updateWadir(Request $request)
    {
        $request->validate([
            'surat_id' => 'required',
            'wadir_id' => 'required',
        ]);

        $surat = Surat::findOrFail($request->surat_id);
        $surat->wadir_id = $request->wadir_id;
        $surat->save();

        return redirect()->route('surat.index')->with('success', 'Data berhasil ditambahkan');
    }
}
