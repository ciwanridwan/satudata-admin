<?php

namespace App\Http\Controllers;

use App\NewsFlash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NewflashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newflash = NewsFlash::paginate(10);
        return view('admins.newflash.index')->with('newflash', $newflash);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.newflash.create');
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
                'judul' => 'required|string|max:255'
            ]
        );

        $new = new NewsFlash();
        $new->judul = $request->input('judul');
        $new->save();
        
        Session::put('message', 'Data berhasil ditambah');
        return redirect(route('index-newflash-admin'));
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
        $edit = NewsFlash::where('judul', $judul)->first();
        return view('admins.newflash.edit')->with('edit', $edit);
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
                'judul' => 'required|string|max:255'
            ]
        );
        
        $new = NewsFlash::find($id);
        $new->judul = $request->input('judul');
        $new->update();
        
        Session::put('message', 'Data berhasil diperbaharui');
        return redirect(route('index-newflash-admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = NewsFlash::find($id);
        $new->delete();

        Session::put('message', 'Data berhasil dihapus');
        return redirect(route('index-newflash-admin'));
    }
}
