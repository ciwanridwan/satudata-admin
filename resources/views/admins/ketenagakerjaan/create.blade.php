@extends('layouts.dashboards.app')

@section('title')
Ketenagakerjaan
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
                            <h4 class="card-title">Input Ketenagakerjaan</h4>
                            <form class="forms-sample" action="{{route('store-publikasi-admin')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required
                                        placeholder="..........">
                                    <p class="text-danger">{{ $errors->first('judul') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect2">Default select</label>
                                    <select class="form-control" id="exampleFormControlSelect2">
                                      <option>1</option>
                                      <option>2</option>
                                      <option>3</option>
                                      <option>4</option>
                                      <option>5</option>
                                    </select>
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