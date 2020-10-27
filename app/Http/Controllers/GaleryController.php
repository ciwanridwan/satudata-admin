<?php

namespace App\Http\Controllers;

use App\Galery;
use App\Gambar;
use App\KategoriGalery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galery::paginate(10);
        $kategori = KategoriGalery::all();
        return view('admins.galery.index')->with('galeri', $galeri)->with('kategori', $kategori);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriGaleri = KategoriGalery::all();
        return view('admins.galery.create')->with('kategoriGaleri', $kategoriGaleri);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'judul' => 'required|unique:galeries,judul|max:255',
                'kategori_galery_id' => 'required|exists:kategori_galeries,id',
                'foto.*' => 'required|image|mimes:jpg,jpeg,png',
                'description' => 'required|string',
            ]
        );

        $galeri = new Galery();
        $galeri->judul = $request->input('judul');
        $galeri->kategori_galery_id = $request->input('kategori_galery_id');

        $foto = '';
        if ($request->hasFile('foto')) {
            $fileNameWithExtension = $request->file('foto')[0]->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto')[0]->getClientOriginalExtension();
            $foto = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto')[0]->storeAs('public/files/photos', $foto);
        }

        $galeri->foto = $foto;
        $galeri->description = $request->input('description');
        $galeri->save();

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $key => $value) {
                $fileNameWithExtension = $value->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
                $extension = $value->getClientOriginalExtension();
                $picture = $fileName . '_' . time() . '.' . $extension;
                $path = $value->storeAs('public/files/photos', $picture);

                $pictures = new Gambar();
                $pictures->picture = $picture;
                $galeri->gambars()->save($pictures);
            }
        }

        Session::put('message', 'Data berhasil ditambah');
        return redirect(route('index-galeri-admin'));
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
    public function edit($judul)
    {
        $data['edit'] = Galery::where('judul', $judul)->first();
        $data['images'] = Gambar::where('galery_id', $data['edit']->id)->get();
        $data['kategoriGaleri'] = KategoriGalery::all();
        return view('admins.galery.edit')->with($data);
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
        $this->validate(
            $request,
            [
                'judul' => 'required|unique:galeries,judul|max:255',
                'kategori_galery_id' => 'required|exists:kategori_galeries,id',
                'foto.*' => 'mimes:jpg,jpeg,png',
                'judul' => 'required|string',
                'description' => 'required|string',
            ]
        );

        $galeri = Galery::find($id);
        $galeri->judul = $request->input('judul');
        $galeri->description = $request->input('description');
        $galeri->kategori_galery_id = $request->input('kategori_galery_id');
        $galeri->update();

        if ($request->hasFile('foto')) {
            foreach ($request->file('foto') as $key => $value) {
                $fileNameWithExtension = $value->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
                $extension = $value->getClientOriginalExtension();
                $picture = $fileName . '_' . time() . '.' . $extension;
                $path = $value->storeAs('public/files/photos', $picture);

                $pictures = new Gambar();
                $pictures->picture = $picture;
                $galeri->gambars()->save($pictures);
            }
        }

        Session::put('message', 'Data berhasil diperbaharui');
        return redirect(route('index-galeri-admin'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $galeri = Galery::find($id);
        $galeri->delete();

        Session::put('message', 'Data berhasil dihapus');
        return redirect(route('index-galeri-admin'));
    }

    public function deleteImage($id)
    {
        Gambar::find($id)->delete();
        return redirect()->back();
    }
}
