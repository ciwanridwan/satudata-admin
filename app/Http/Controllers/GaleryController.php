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
                'foto' => 'required|image|mimes:jpg,jpeg,png',
                'picture' => 'required|image|mimes:jpg,jpeg,png',
                'picture2' => 'required|image|mimes:jpg,jpeg,png',
                'picture3' => 'required|image|mimes:jpg,jpeg,png',
                'picture4' => 'required|image|mimes:jpg,jpeg,png',
                'description' => 'required|string',
            ]
        );

        if ($request->hasFile('foto')) {
            $fileNameWithExtension = $request->file('foto')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $foto = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto')->storeAs('public/files/photos', $foto);
        } else {
            $foto = '';
        }
        $galeri = new Galery();
        $galeri->judul = $request->input('judul');
        $galeri->kategori_galery_id = $request->input('kategori_galery_id');
        $galeri->foto = $foto;
        $galeri->description = $request->input('description');
        // dd($galeri);
        $galeri->save();

        if ($request->hasFile('picture')) {
            $fileNameWithExtension = $request->file('picture')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $picture = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->storeAs('public/files/photos', $picture);
        } else {
            $picture = 'noimage.jpg';
        }

        if ($request->hasFile('picture2')) {
            $fileNameWithExtension = $request->file('picture2')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('picture2')->getClientOriginalExtension();
            $picture2 = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('picture2')->storeAs('public/files/photos', $picture2);
        } else {
            $picture2 = 'noimage.jpg';
        }


        if ($request->hasFile('picture3')) {
            $fileNameWithExtension = $request->file('picture3')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('picture3')->getClientOriginalExtension();
            $picture3 = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('picture3')->storeAs('public/files/photos', $picture3);
        } else {
            $picture3 = 'noimage.jpg';
        }

        if ($request->hasFile('picture4')) {
            $fileNameWithExtension = $request->file('picture4')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('picture4')->getClientOriginalExtension();
            $picture4 = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('picture4')->storeAs('public/files/photos', $picture4);
        } else {
            $picture4 = 'noimage.jpg';
        }

        $pictures = new Gambar();
        $pictures->picture = $picture;
        $galeri->gambars()->save($pictures);

        $pictureTwo = new Gambar();
        $pictureTwo->picture = $picture2;
        $galeri->gambars()->save($pictureTwo);

        $pictureTree = new Gambar();
        $pictureTree->picture = $picture3;
        $galeri->gambars()->save($pictureTree);

        $pictureFour = new Gambar();
        $pictureFour->picture = $picture4;
        $galeri->gambars()->save($pictureFour);

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
        $edit = Galery::where('judul', $judul)->first();
        $kategoriGaleri = KategoriGalery::all();
        return view('admins.galery.edit')->with('edit', $edit)->with('kategoriGaleri', $kategoriGaleri);
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
                'foto' => 'image|mimes:jpg,jpeg,png',
                'judul' => 'required|string',
                'description' => 'required|string',
                'picture' => 'image|mimes:jpg,jpeg,png',
                'picture2' => 'image|mimes:jpg,jpeg,png',
                'picture3' => 'image|mimes:jpg,jpeg,png',
                'picture4' => 'image|mimes:jpg,jpeg,png'
            ]
        );

        $galeri = Galery::find($id);
        if ($request->hasFile('foto')) {
            $fileNameWithExtension = $request->file('foto')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $foto = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('foto')->storeAs('public/files/photos', $foto);
            $galeri->foto = $foto;

            $select_old_gambar_name = DB::table('galeries')->where('id', $request->id)->first();

            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/files/photos', $select_old_gambar_name->foto);
            }
        }

        $galeri->judul = $request->input('judul');
        $galeri->description = $request->input('description');
        $galeri->kategori_galery_id = $request->input('kategori_galery_id');
        $galeri->update();

        $pictures = Gambar::where('galery_id', $galeri->id)->first();
        // dd($pictures);
        if ($request->hasFile('picture')) {
            $fileNameWithExtension = $request->file('picture')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('picture')->getClientOriginalExtension();
            $picture = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('picture')->storeAs('public/files/photos', $picture);
            $pictures->picture = $picture;
            $select_old_gambar_name = DB::table('galeries')->where('id', $request->id)->first();
            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/infograpiks', $select_old_gambar_name->foto);
            }
        }
        $galeri->gambars()->update(array());

        $pictureTwo = Gambar::find('galery_id', $id);
        if ($request->hasFile('picture2')) {
            $fileNameWithExtension = $request->file('picture2')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('picture2')->getClientOriginalExtension();
            $picture2 = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('picture2')->storeAs('public/files/photos', $picture2);
            $select_old_gambar_name = DB::table('galeries')->where('id', $request->id)->first();
            $pictureTwo->picture = $picture2;
            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/infograpiks', $select_old_gambar_name->foto);
            }
        }
        $galeri->gambars()->update($pictureTwo);

        $pictureTree = Gambar::find('galery_id', $id);
        if ($request->hasFile('picture3')) {
            $fileNameWithExtension = $request->file('picture3')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('picture3')->getClientOriginalExtension();
            $picture3 = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('picture3')->storeAs('public/files/photos', $picture3);
            $select_old_gambar_name = DB::table('galeries')->where('id', $request->id)->first();
            $pictureTree->picture = $picture3;
            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/infograpiks', $select_old_gambar_name->foto);
            }
        }
        $galeri->gambars()->update($pictureTree);
        

        $pictureFour = Gambar::find('galery_id', $id);
        if ($request->hasFile('picture4')) {
            $fileNameWithExtension = $request->file('picture4')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('picture4')->getClientOriginalExtension();
            $picture4 = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('picture4')->storeAs('public/files/photos', $picture4);
            $select_old_gambar_name = DB::table('galeries')->where('id', $request->id)->first();
            $pictureFour->picture = $picture4;
            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/infograpiks', $select_old_gambar_name->foto);
            }
        }
        $galeri->gambars()->update($pictureFour);

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
}
