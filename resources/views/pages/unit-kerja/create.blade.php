@extends('layouts.dashboards.app')

@section('title')
Tambah Unit Kerja
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tambah Unit Kerja</h4>
                            <form class="forms-sample" action="{{route('store-UnitKerja')}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="nama">Unit Kerja</label>
                                    <input type="nama" class="form-control" id="nama" placeholder="............."
                                        name="nama" required autofocus>
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