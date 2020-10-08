<?php

namespace App\Http\Controllers;

use App\JenisData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JenisDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $showJenisData = JenisData::all();
        return view('pages.jenis-data.index')->with('showJenisData', $showJenisData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.jenis-data.create');
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
        $addJenisData = new JenisData();
        $addJenisData->nama = $request->input('nama');
        $addJenisData->save();

        Session::put('message', 'Data Berhasil Ditambah');
        return redirect(route('index-jenisdata'));
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
        $edit = JenisData::where('nama', $nama)->get();
        foreach ($edit as $key) {
            return view('pages.jenis-data.edit')->with('key', $key);
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
        $update = JenisData::find($id);
        $update->nama = $request->input('nama');
        $update->update();

        Session::put('message', 'Data Berhasil Diperbaharui');
        return redirect(route('index-jenisdata'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = JenisData::find($id);
        $delete->delete();

        Session::put('message', 'Data Berhasil Dihapus');
        return redirect(route('index-jenisdata'));
    }
}
