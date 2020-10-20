<?php

namespace App\Http\Controllers;

use App\Data;
use App\Ketenagakerjaan;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{
    public function unduhFile($file)
    {
        $file_path = public_path('files/' . $file);
        return response()->download($file_path);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Data::orderBy('created_at', 'desc');
        $tenagakerja = Ketenagakerjaan::all();
        if (request()->q != '') {
            $data = $data->where('judul', 'LIKE', '%' . request()->q . '%');
        }
        $data = $data->paginate(10);
        // dd($data);
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
                'isi' => 'required|max:320',
                'file' => 'required|mimes:pdf,jpg,jpeg,doc,docx,pptx,xlsx,cls,xls,zip',
                'ketenagakerjaan_id' => 'required|exists:ketenagakerjaans,id',
                'abstraksi' => 'required',
            ]);

        if ($request->hasFile('file')) {
            $fileNameWithExtension = $request->file('file')->getClientOriginalName();
            $sizeFile = $request->file('file')->getSize();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $files = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('file')->storeAs('public/files', $files);
        } else {
            $files = '';
        }


        if ($sizeFile >= 1073741824) {
            $sizeFile = number_format($sizeFile / 1073741824, 2) . 'GB';
        } elseif ($sizeFile >= 1048576) {
            $sizeFile = number_format($sizeFile / 1048576, 2) . ' MB';
        } elseif ($sizeFile >= 1024) {
            $sizeFile = number_format($sizeFile / 1024, 2) . ' KB';
        } elseif ($sizeFile > 1) {
            $sizeFile = $sizeFile . ' bytes';
        } elseif ($sizeFile == 1) {
            $sizeFile = $sizeFile . ' byte';
        } else {
            $sizeFile = '0 bytes';
        }

        $data = new Data();
        $data->judul = $request->input('judul');
        $data->isi = $request->input('isi');
        $data->file = $files;
        $data->size_files = $sizeFile;
        $data->abstraksi = $request->input('abstraksi');
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
        $this->validate($request, 
            [
                'judul' => 'required|unique:data,judul|max:255',
                'isi' => 'required|max:200',
                'file' => 'required|mimes:pdf,jpg,jpeg,doc,docx,pptx,xlsx,cls,xls,zip',
                'ketenagakerjaan_id' => 'required|exists:ketenagakerjaans,id',
                'abstraksi' => 'required',
            ]
        );

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
        }

        if ($sizeFile >= 1073741824) {
            $sizeFile = number_format($sizeFile / 1073741824, 2) . 'GB';
        } elseif ($sizeFile >= 1048576) {
            $sizeFile = number_format($sizeFile / 1048576, 2) . ' MB';
        } elseif ($sizeFile >= 1024) {
            $sizeFile = number_format($sizeFile / 1024, 2) . ' KB';
        } elseif ($sizeFile > 1) {
            $sizeFile = $sizeFile . ' bytes';
        } elseif ($sizeFile == 1) {
            $sizeFile = $sizeFile . ' byte';
        } else {
            $sizeFile = '0 bytes';
        }
        $data->file = $files;
        $data->ketenagakerjaan_id = $request->input('ketenagakerjaan_id');
        $data->size_files = $sizeFile;
        $data->abstraksi = $request->input('abstraksi');
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
