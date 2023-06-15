<?php

namespace App\Http\Controllers;

use App\Models\Wadir;
use Illuminate\Http\Request;

class WadirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wadir = Wadir::get();

        return view('admin.wadir.index', compact('wadir'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.wadir.create');
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
            'nama_wadir' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);
        Wadir::create($request->all());
        return redirect()->route('wadir.index')
            ->with('success', 'Wadir Sukses diTambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wadir  $wadir
     * @return \Illuminate\Http\Response
     */
    public function show(Wadir $wadir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wadir  $wadir
     * @return \Illuminate\Http\Response
     */
    public function edit($wadir)
    {
        $wadir = Wadir::find($wadir);
        return view('admin.wadir.edit', compact('wadir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wadir  $wadir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $wadir)
    {
        $request->validate([
            'nama_wadir' => 'required',
            'nip' => 'required',
            'jabatan' => 'required',
        ]);
        wadir::find($wadir)->update($request->all());
        return redirect()->route('wadir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wadir  $wadir
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Wadir::find($id)->delete();

        return back();
    }
}
