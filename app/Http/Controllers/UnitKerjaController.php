<?php

namespace App\Http\Controllers;

use App\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unitKerja = UnitKerja::all();
        return view('pages.unit-kerja.index')->with('unitKerja', $unitKerja);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.unit-kerja.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, 
        [
            'nama' => 'required|max:255'
        ]);
        $addUnitKerja = new UnitKerja();
        $addUnitKerja->nama = $request->input('nama');
        $addUnitKerja->save();

        Session::put('message', 'Data Berhasil Ditambah');
        return redirect(route('index-UnitKerja'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nama)
    {
        $edit = UnitKerja::where('nama', $nama)->get();
        foreach ($edit as $key) {
            return view('pages.unit-kerja.edit')->with('key', $key);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = UnitKerja::find($id);
        $update->nama = $request->input('nama');
        $update->update();

        Session::put('message', 'Data Berhasil Diperbaharui');
        return redirect(route('index-UnitKerja'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = UnitKerja::find($id);
        $delete->delete();

        Session::put('message', 'Data Berhasil Dihapus');
        return redirect(route('index-UnitKerja'));
    }
}
