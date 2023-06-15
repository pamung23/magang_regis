<?php

namespace App\Http\Controllers\kaprodi;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Perusahaan1Controller extends Controller
{ //
    public function index()
    {
        $perusahaan = Perusahaan::get();

        return view('kaprodi.perusahaan.index', compact('perusahaan'));
    }

    public function create()
    {
        return view('kaprodi.perusahaan.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'kota_kecamatan' => 'required',
            'email' => 'required|email',
            'no_perusahaan' => 'required',
            'no_telpn_contact_person' => 'required',
        ]);
        Perusahaan::create($request->all());
        return redirect()->route('perusahaan.index')
            ->with('success', 'Perusahaan Sukses diTambah');
    }

    public function edit($id)
    {
        return view('kaprodi.perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'kota_kecamatan' => 'required',
            'email' => 'required',
            'no_perusahaan' => 'required',
            'no_telpn_contact_person' => 'required',
        ]);
        $perusahaan->update($request->all());

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data Berhasil diEdit');
    }

    public function destroy($id)
    {
        Perusahaan::find($id)->delete();

        return back();
    }
}
