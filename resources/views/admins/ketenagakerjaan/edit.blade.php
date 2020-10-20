@extends('layouts.dashboards.app')

@section('title')
Edit Ketenagakerjaan
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
                            <h4 class="card-title">Edit Ketenagakerjaan</h4>
                            <form class="forms-sample" action="{{route('update-ketenagakerjaan-admin', $edit->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$edit->nama}}"
                                        placeholder="..........">
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="form-control" id="kategori" name="kategori">
                                        <option value="">{{$edit->kategori}}</option>  
                                      <option value="umum">Umum</option>
                                      <option value="khusus">Khusus</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('kategori') }}</p>
                                  </div>
                                
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                            </form>
                            {{-- <button class="btn btn-light">Cancel</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection