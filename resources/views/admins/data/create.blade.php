@extends('layouts.dashboards.app')

@section('title')
Data
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
                            <h4 class="card-title">Input Data</h4>
                            <form class="forms-sample" action="{{route('store-data-admin')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required
                                        placeholder="..........">
                                    <p class="text-danger">{{ $errors->first('judul') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="file">File</label>
                                    <input type="file" class="form-control form-control-lg" id="file" name="file" required
                                        placeholder="..........">
                                    <p class="text-danger">{{ $errors->first('file') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="ketenagakerjaan_id">Ketenagakerjaan</label>
                                    <select class="form-control" id="ketenagakerjaan_id" name="ketenagakerjaan_id" required>
                                    <option value="">Pilih Ketenagakerjaan</option>  
                                      @foreach ($tenagakerja as $item)
                                      <option value="{{$item->id}}">{{$item->nama}}</option>
                                      @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('ketenagakerjaan_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="abstraksi">Abstraksi</label>
                                    <textarea name="abstraksi" id="description" class="form-control">{{ old('description') }}</textarea>
                                    <p class="text-danger">{{ $errors->first('abstraksi') }}</p>
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

@section('js-deskripsi')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection