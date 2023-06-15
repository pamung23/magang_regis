<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::all();
        return view('admin.mahasiswa.index', compact('mahasiswa', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mahasiswa.create', ['prodi' => Prodi::all()]);
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
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'jenis_kelamin' => 'required',
            'prodi_id' => 'required',
            
        ]);
        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($mahasiswa)
    {
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::find($mahasiswa);
        return view('admin.mahasiswa.edit', ['prodi' => $prodi, 'mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mahasiswa)
    {
        $request->validate([
            'nim' => 'required',
            'nama_mahasiswa' => 'required',
            'jenis_kelamin' => 'required',
            'prodi_id' => 'required',
        ]);
        Mahasiswa::find($mahasiswa)->update($request->all());
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();

        return back();
    }
}
