<?php

namespace App\Http\Controllers;

use App\Data;
use App\Ketenagakerjaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::paginate(10);
        $tenagakerja = Ketenagakerjaan::all();
        return view('admins.data.index')->with('data', $data)->with('tenagakerja', $tenagakerja);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenagakerja = Ketenagakerjaan::all();
        return view('admins.data.create')->with('tenagakerja', $tenagakerja);
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
            'judul' => 'required|unique:data,judul|max:255',
            'isi' => 'required',
            'file' => 'required|mimes:pdf,jpg,jpeg,doc,docx,pptx,xlsx,cls,xls',
            'ketenagakerjaan_id' => 'required|exists:ketenagakerjaans,id',
        ]);

        if ($request->hasFile('file')) {
            $fileNameWithExtension = $request->file('file')->getClientOriginalName();
            $sizeFile = $request->file('file')->getSize();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $files = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('file')->storeAs('public/files', $files);
        } else {
            $files = 'nofile.pdf';
        }

        $data = new Data();
        $data->judul = $request->input('judul');
        $data->isi = $request->input('isi');
        $data->file = $files;
        $data->ketenagakerjaan_id = $request->input('ketenagakerjaan_id');
        $data->save();

        Session::put('message', 'Data berhasil ditambah');
        return redirect(route('index-data-admin'));
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
        $edit = Data::where('judul', $judul)->first();
        $tenagakerja = Ketenagakerjaan::all();
        return view('admins.data.edit')->with('edit', $edit)->with('tenagakerja', $tenagakerja);
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
        $data =  Data::find($id);
        $data->judul = $request->input('judul');
        $data->isi = $request->input('isi');
        if ($request->hasFile('file')) {
            $fileNameWithExtension = $request->file('file')->getClientOriginalName();
            $sizeFile = $request->file('file')->getSize();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $files = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('file')->storeAs('public/files', $files);
        } else {
            $files = 'nofile.pdf';
        }
        $data->file = $files;
        $data->ketenagakerjaan_id = $request->input('ketenagakerjaan_id');
        $data->update();

        Session::put('message', 'Data berhasil Diperbaharui');
        return redirect(route('index-data-admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Data::find($id);
        $delete->delete();

        Session::put('message', 'Data berhasil dihapus');
        return redirect(route('index-data-admin'));
    }
}
