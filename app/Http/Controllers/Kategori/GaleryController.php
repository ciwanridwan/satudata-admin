<?php

namespace App\Http\Controllers\Kategori;

use App\Galery;
use App\Http\Controllers\Controller;
use App\KategoriGalery;
use App\KategoriInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = KategoriGalery::paginate(10);
        return view('pages.kategori.galery.index')->with('kategori', $kategori);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kategori.galery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|max:255'
        ]);

        $kategori = new KategoriGalery();
        $kategori->nama = $request->input('nama');
        $kategori->save();

        Session::put('message', 'Data Berhasil Ditambah');
        return redirect(route('index-kategori-galery'));
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
        $edit = KategoriGalery::where('nama', $nama)->get();
        foreach ($edit as $key) {
            return view('pages.kategori.galery.edit')->with('key', $key);
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
        $kategori = KategoriGalery::find($id);
        $kategori->nama = $request->input('nama');
        $kategori->update();

        Session::put('message', 'Data Berhasil Diperbaharui');
        return redirect(route('index-kategori-galery'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = KategoriGalery::find($id);
        $delete->delete();

        Session::put('message', 'Data Berhasil Dihapus');
        return redirect(route('index-kategori-galery'));
    }
}
