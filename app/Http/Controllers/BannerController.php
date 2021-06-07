<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner = Banner::paginate(10);
        return view('admins.banner.index')->with('banner', $banner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.banner.create');
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
                'gambar' => 'required|mimes:jpg,jpeg,png'
            ]
        );
        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $gambar = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/files/banners', $gambar);
        } else {
            $gambar = 'NoImage.jpg';
        }

        $new = new Banner();
        $new->gambar = $gambar;
        $new->save();
        
        Session::put('message', 'Banner berhasil ditambah');
        return redirect(route('index-banner-admin'));
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
    public function edit($gambar)
    {
        
        $edit = Banner::where('gambar', $gambar)->first();
        return view('admins.banner.edit')->with('edit', $edit);
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
            'gambar' => 'required|mimes:jpg,jpeg,png'
        ]);

        $update = Banner::find($id);

        if ($request->hasFile('gambar')) {
            $fileNameWithExtension = $request->file('gambar')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('gambar')->getClientOriginalExtension();
            $gambar = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('gambar')->storeAs('public/files/banners', $gambar);
            $select_old_gambar_name = DB::table('banners')->where('id', $request->id)->first();
            $update->gambar = $gambar;   
            if ($select_old_gambar_name != 'noimage.jpg') {
                Storage::delete('public/banners', $select_old_gambar_name->gambar);
            }
        }
        $update->update();

        Session::put('message', 'Banner berhasil diperbaharui');
        return redirect(route('index-banner-admin'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = Banner::find($id);
        $new->delete();

        Session::put('message', 'Banner berhasil dihapus');
        return redirect(route('index-banner-admin'));
    }
}
