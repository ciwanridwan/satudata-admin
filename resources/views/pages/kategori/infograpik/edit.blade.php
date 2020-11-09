@extends('layouts.dashboards.app')

@section('title')
Edit Kategori Infografik
@endsection


@section('content')

<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Edit Kategori Infografik</h4>
                            <form class="forms-sample" action="{{route('update-kategori-infograpik', $key->id)}}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="nama">Judul</label>
                                    <input type="text" class="form-control" id="nama" name="nama" required
                                        placeholder="..........">
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