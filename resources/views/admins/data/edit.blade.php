@extends('layouts.dashboards.app')

@section('title')
Edit Data
@endsection


@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @if (Session::has('message'))
                            <div class="alert alert-success">
                                <p>
                                    {{Session::get('message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </p>
                            </div>
                            {{Session::put('message', null)}}
                            @endif
                            <h4 class="card-title">Edit Data</h4>
                            <form class="forms-sample" action="{{route('update-data-admin', $edit->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{$edit->judul}}"
                                        placeholder="..........">
                                    <p class="text-danger">{{ $errors->first('judul') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="isi">Isi</label>
                                    <input type="text" class="form-control" id="isi" name="isi" value="{{$edit->isi}}"
                                        placeholder="..........">
                                    <p class="text-danger">{{ $errors->first('isi') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" class="form-control form-control-lg" id="file" name="file" value="{{$edit->file}}"
                                        placeholder="..........">
                                    <p class="text-danger">{{ $errors->first('file') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="ketenagakerjaan_id">Ketenagakerjaan</label>
                                    <select class="form-control" id="ketenagakerjaan_id" name="ketenagakerjaan_id">
                                    <option value="{{$edit->ketenagakerjaan_id}}">Pilih Ketenagakerjaan</option>  
                                      @foreach ($tenagakerja as $item)
                                      <option value="{{$item->id}}">{{$item->nama}}</option>
                                      @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('ketenagakerjaan_id') }}</p>
                                </div>
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                            </form>
                            <button class="btn btn-light">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection