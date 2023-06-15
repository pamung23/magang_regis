<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prodi = Prodi::all();
        $jurusan = Jurusan::all();
        return view('admin.prodi.index', compact('jurusan', 'prodi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $jurusan = Jurusan::all();
        return view('admin.prodi.create', ['jurusan' => $jurusan]);
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
            'nama_prodi' => 'required',
            'jenjang' => 'required',
            'jurusan_id' => 'required',
        ]);
        Prodi::create($request->all());
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit($prodi)
    {
        $prodi = Prodi::find($prodi);
        $dosen = Dosen::all();
        $jurusan = Jurusan::all();
        return view('admin.prodi.edit', ['prodi' => $prodi, 'jurusan' => $jurusan,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $prodi)
    {
        $request->validate([
            'nama_prodi' => 'required',
            'jurusan_id' => 'required',
            'jenjang' => 'required',

        ]);
        Prodi::find($prodi)->update($request->all());
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Prodi::find($id)->delete();

        return back();
    }
}
