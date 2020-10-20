<?php

namespace App\Http\Controllers;

use App\Ketenagakerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KetenagakerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ketenagakerjaan = Ketenagakerjaan::paginate(10);
        return view('admins.ketenagakerjaan.index')->with('ketenagakerjaan', $ketenagakerjaan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.ketenagakerjaan.create');
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
                'nama' => 'required|unique:ketenagakerjaans,nama|max:255',
                'kategori' => 'required|string|max:255'
            ]
        );

        $ketenagakerjaan = new Ketenagakerjaan();
        $ketenagakerjaan->nama = $request->input('nama');
        $ketenagakerjaan->kategori = $request->input('kategori');
        $ketenagakerjaan->save();

        Session::put('message', 'Data berhasil ditambah');
        return redirect(route('index-ketenagakerjaan-admin'));
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
        $edit = Ketenagakerjaan::where('nama', $nama)->first();
        return view('admins.ketenagakerjaan.edit')->with('edit', $edit);
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
        $this->validate($request, 
        [
            'nama' => 'required|unique:ketenagakerjaans,nama|max:255',
            'kategori' => 'required|string|max:255'
        ]);
        $ketenagakerjaan = Ketenagakerjaan::find($id);
        $ketenagakerjaan->nama = $request->input('nama');
        $ketenagakerjaan->kategori = $request->input('kategori');
        $ketenagakerjaan->update();
        // dd($ketenagakerjaan);

        Session::put('message', 'Data berhasil diperbaharui');
        return redirect(route('index-ketenagakerjaan-admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ketenagakerjaan = Ketenagakerjaan::find($id);
        $ketenagakerjaan->delete();

        Session::put('message', 'Data berhasil dihapus');
        return redirect(route('index-ketenagakerjaan-admin'));
    }
}
