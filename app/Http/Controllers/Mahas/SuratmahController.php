<?php

namespace App\Http\Controllers\Mahas;

use Carbon\Carbon;
use App\Models\Prodi;
use App\Models\Surat;
use App\Models\Wadir;
use App\Helpers\Helper;
use App\Models\Mahasiswa;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuratmahController extends Controller
{
    public function index()
    {
        if (!auth()->guard('mahasiswa')->check()) {
            return redirect()->route('mahasiswa.login');
        }
        $surat = auth()->guard('mahasiswa')->user()->surats;
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $wadir = Wadir::all();
        $perusahaan = Perusahaan::all();
        $surat = Surat::all();
        return view('mahasiswa.pendaftaran.index', compact('prodi', 'wadir', 'perusahaan', 'surat', 'mahasiswa'));
    }
    public function create()
    {
        $prodi = Prodi::all();
        $wadir = Wadir::all();
        $mahasiswa = Mahasiswa::all();
        $perusahaan = Perusahaan::all();
        return view('mahasiswa.pendaftaran.create', compact('wadir', 'perusahaan', 'mahasiswa', 'prodi'));
    }

    public function store(Request $request)
    {
        $mahasiswa_id = auth()->guard('mahasiswa')->user()->id;
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'prodi_id' => 'required',
            'perusahaan_id' => 'required',
        ]);

        // Cek apakah surat dengan data yang sama pernah ditolak oleh prodi atau akademik
        $suratDitolak = Surat::whereHas('mahasiswa', function ($query) use ($mahasiswa_id) {
            $query->where('mahasiswa_id', $mahasiswa_id);
        })
            ->where(function ($query) {
                $query->where('status_surat_prodi', 'Ditolak')
                    ->orWhere('status_surat_akademik2', 'Ditolak');
            })
            ->exists();

        if (!$suratDitolak) {
            // Surat belum pernah ditolak, maka mahasiswa diperbolehkan mendaftar
            $surat = Surat::create([
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'prodi_id' => $request->prodi_id,
                'perusahaan_id' => $request->perusahaan_id,
                'wadir_id' => 1,
            ]);

            if ($request->has('mahasiswa')) {
                $mahasiswa_ids = $request->mahasiswa;

                // Mengurutkan NIM mahasiswa berdasarkan huruf awalan
                usort($mahasiswa_ids, function ($a, $b) {
                    $hurufAwalanA = substr($a, 0, 1);
                    $hurufAwalanB = substr($b, 0, 1);
                    return strcmp($hurufAwalanA, $hurufAwalanB);
                });

                $surat->mahasiswa()->attach($mahasiswa_ids);
            }

            return redirect()->route('pendaftaran.index')->with('success', 'Data Telah Berhasil Ditambahkan');
        }

        // Surat pernah ditolak, maka mahasiswa diperbolehkan mendaftar lagi
        $surat = Surat::create([
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'prodi_id' => $request->prodi_id,
            'perusahaan_id' => $request->perusahaan_id,
            'wadir_id' => 1,
        ]);

        if ($request->has('mahasiswa')) {
            $mahasiswa_ids = $request->mahasiswa;

            // Mengurutkan NIM mahasiswa berdasarkan huruf awalan
            usort($mahasiswa_ids, function ($a, $b) {
                $hurufAwalanA = substr($a, 0, 1);
                $hurufAwalanB = substr($b, 0, 1);
                return strcmp($hurufAwalanA, $hurufAwalanB);
            });

            $surat->mahasiswa()->attach($mahasiswa_ids);
        }

        return redirect()->route('pendaftaran.index')->with('success', 'Data Telah Berhasil Ditambahkan');
    }




    public function edit($surat)
    {
        $mahasiswa_id = auth()->guard('mahasiswa')->user()->id;
        $surat = Surat::whereHas('mahasiswa', function ($query) use ($mahasiswa_id, $surat) {
            $query->where('mahasiswa_id', $mahasiswa_id)
                ->where('surat_id', $surat);
        })->firstOrFail();

        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        $perusahaan = Perusahaan::all();

        return view('mahasiswa.pendaftaran.edit', compact('surat', 'prodi', 'perusahaan', 'mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'prodi_id' => 'required',
            'perusahaan_id' => 'required',
        ]);

        $mahasiswa_id = auth()->guard('mahasiswa')->user()->id;
        $surat = Surat::whereHas('mahasiswa', function ($query) use ($mahasiswa_id, $id) {
            $query->where('mahasiswa_id', $mahasiswa_id)
                ->where('surat_id', $id);
        })->firstOrFail();

        $surat_data = [
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'prodi_id' => $request->prodi_id,
            'perusahaan_id' => $request->perusahaan_id,
        ];

        if ($request->has('mahasiswa')) {
            $surat->mahasiswa()->sync($request->mahasiswa);
        }

        $surat->update($surat_data);

        return redirect()->route('pendaftaran.index')->with('success', 'Data Telah Berhasil Diperbarui');
    }
}
