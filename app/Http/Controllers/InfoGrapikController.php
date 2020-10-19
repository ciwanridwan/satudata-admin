<?php

namespace App\Http\Controllers;

use App\City;
use App\InfoGrapik;
use App\KategoriInfo;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class InfoGrapikController extends Controller
{
    public function getCity()
    {
        $cities = City::where('province_id', request()->province_id)->get();
        return response()->json(['status' => 'success', 'data' => $cities]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infograpik = InfoGrapik::paginate(10);
        $kategori = KategoriInfo::all();
        return view('admins.infograpik.index')->with('infograpik', $infograpik)->with('kategori', $kategori);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        $kategori = KategoriInfo::all();
        return view('admins.infograpik.create')->with('provinces', $provinces)->with('kategori', $kategori);
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
            'judul' => 'required|unique:info_grapiks,judul|max:255',
            'kategori_info_id' => 'required|exists:kategori_infos,id',
            'province_id' => 'required|exists:provinces,id',
            'city_id' => 'required|exists:cities,id',
            'gambar' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $gambar = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/infograpiks', $gambar);
        } else {
            $gambar = 'noimage.jpg';
        }

        $infograpik = new InfoGrapik();
        $infograpik->judul = $request->input('judul');
        $infograpik->kategori_info_id = $request->input('kategori_info_id');
        $infograpik->province_id = $request->input('province_id');
        $infograpik->city_id = $request->input('city_id');
        $infograpik->gambar = $gambar;
        $infograpik->save();

        Session::put('message', 'Data berhasil ditambah');
        return redirect(route('index-infograpik-admin'));
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
        $edit = InfoGrapik::where('judul', $judul)->first();
        $kategori = KategoriInfo::all();
        $provinces = Province::all();
        $city = City::all();
        return view('admins.infograpik.edit')->with('edit', $edit)->with('kategori', $kategori)->with('provinces', $provinces)
        ->with('city', $city);
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
        $update = InfoGrapik::find($id);
        $update->judul = $request->input('judul');
        $update->kategori_info_id = $request->input('kategori_info_id');
        $update->province_id = $request->input('province_id');
        $update->city_id = $request->input('city_id');
        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $gambar = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/infograpiks', $gambar);
            $select_old_gambar_name = DB::table('info_grapiks')->where('id', $request->id)->first();
            $update->gambar = $gambar;   
            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/infograpiks', $select_old_gambar_name->foto);
            }
        }
        $update->update();

        Session::put('message', 'Data berhasil diperbaharui');
        return redirect(route('index-infograpik-admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = InfoGrapik::find($id);
        $delete->delete();

        Session::put('message', 'Data berhasil dihapus');
        return redirect(route('index-infograpik-admin'));
    }
}
