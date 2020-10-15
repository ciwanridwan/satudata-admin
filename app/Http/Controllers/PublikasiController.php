<?php

namespace App\Http\Controllers;

use App\Publikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PublikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publikasi = Publikasi::paginate(10);
        return view('admins.publikasi.index')->with('publikasi', $publikasi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.publikasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customMessage = [
            'unique' => ':attribute Sudah digunakan, tidak boleh sama'
        ];

        $this->validate($request,
            [
                'judul' => 'required|max:255|unique:publikasis,judul',
                'isi' => 'required',
                'file' => 'required|mimes:pdf,doc,docx,xlsx,xls,pptx',
                'thumbnail' => 'required|mimes:jpeg,bmp,png',
            ], $customMessage);

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

        if ($request->hasFile('thumbnail')) {
            $fileNameWithExtension = $request->file('thumbnail')->getClientOriginalName();
            $sizeFile = $request->file('thumbnail')->getSize();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $thumbnail_files = $fileName . '_' . time() . '.' . $extension;
            $thumbnail_path = $request->file('thumbnail')->storeAs('public/files', $thumbnail_files);
        } else {
            $thumbnail_path = '';
        }

        if ($sizeFile >= 1073741824) {
            $sizeFile = number_format($sizeFile / 1073741824, 2).'GB';
        }
        elseif ($sizeFile >= 1048576)
        {
            $sizeFile = number_format($sizeFile / 1048576, 2) . ' MB';
        }
        elseif ($sizeFile >= 1024)
        {
            $sizeFile = number_format($sizeFile / 1024, 2) . ' KB';
        }
        elseif ($sizeFile > 1)
        {
            $sizeFile = $sizeFile . ' bytes';
        }
        elseif ($sizeFile == 1)
        {
            $sizeFile = $sizeFile . ' byte';
        }
        else
        {
            $sizeFile = '0 bytes';
        }

        $publikasi = new Publikasi();
        $publikasi->judul = $request->input('judul');
        $publikasi->isi = $request->input('isi');
        $publikasi->file = $files;
        $publikasi->size_file = $sizeFile;
        $publikasi->file_path = $path;
        $publikasi->thumbnail = str_replace('public/', null, $thumbnail_path);
        $publikasi->save();

        Session::put('message', 'Data berhasil ditambah');
        return redirect(route('index-publikasi-admin'));
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
        $edit = Publikasi::where('judul', $judul)->first();
        return view('admins.publikasi.edit')->with('edit', $edit);
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
                'judul' => 'string|max:255',
                'isi' => '',
                'file' => 'mimes:pdf,doc,docx,xlsx,xls,pptx',
                'thumbnail' => 'required|mimes:jpeg,bmp,png',
            ]);

        $publikasi = Publikasi::find($id);
        $publikasi->judul = $request->input('judul');
        $publikasi->isi = $request->input('isi');

        if ($request->hasFile('file')) {
            $fileNameWithExtension = $request->file('file')->getClientOriginalName();
            $sizeFile = $request->file('file')->getSize();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $files = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('file')->storeAs('public/monevs/files', $files);

            if ($sizeFile >= 1073741824) {
                $sizeFile = number_format($sizeFile / 1073741824, 2).'GB';
            }
            elseif ($sizeFile >= 1048576)
            {
                $sizeFile = number_format($sizeFile / 1048576, 2) . ' MB';
            }
            elseif ($sizeFile >= 1024)
            {
                $sizeFile = number_format($sizeFile / 1024, 2) . ' KB';
            }
            elseif ($sizeFile > 1)
            {
                $sizeFile = $sizeFile . ' bytes';
            }
            elseif ($sizeFile == 1)
            {
                $sizeFile = $sizeFile . ' byte';
            }
            else
            {
                $sizeFile = '0 bytes';
            }

            $publikasi->file = $files;
            $publikasi->file_path = $path;
            $publikasi->size_file = $sizeFile;
        } else {
            $files = 'nofile.pdf';
        }

        if ($request->hasFile('thumbnail')) {
            $fileNameWithExtension = $request->file('thumbnail')->getClientOriginalName();
            $sizeFile = $request->file('thumbnail')->getSize();
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $files = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('thumbnail')->storeAs('public/files', $files);

            $publikasi->thumbnail = str_replace('public/', null, $path);
        }

        $publikasi->update();
        // dd($publikasi->size_file);

        Session::put('message', 'Data berhasil diperbaharui');
        return redirect(route('index-publikasi-admin'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Publikasi::find($id);
        $delete->delete();

        Session::put('message', 'Data berhasil dihapus');
        return redirect(route('index-publikasi-admin'));
    }
}
