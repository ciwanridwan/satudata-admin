@extends('layouts.dashboards.app')

@section('title')
Data
@endsection

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
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

                        {{Session::put('message', null)}}
                    </div>
                    @endif
                    <form class="ml-auto search-form d-none d-md-block col-md-4" action="" method="GET"
                        action="{{route('index-data-admin')}}">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Cari Judul" name="q"
                                value="{{ request()->q }}">
                        </div>
                        <button class="btn btn-dark btn-rounded btn-fw">Cari</button>
                    </form>
                    <h4 class="card-title">Data</h4>
                    <a href="{{route('create-data-admin')}}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Judul </th>
                                    <th> Isi </th>
                                    <th> File </th>
                                    <th> Ketenagakerjaan </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                <tr>
                                    @forelse ($data as $item)
                                    <td>{{$nomor}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->abstraksi}}</td>
                                    <td>{{$item->file}}</td>
                                    @foreach ($tenagakerja as $tg)
                                    @if ($tg->id == $item->ketenagakerjaan_id)
                                    <td>{{$tg->nama}}</td>
                                    @endif
                                    @endforeach
                                    <td><a href="{{route('edit-data-admin', $item->judul)}}"
                                            class="btn btn-warning">Edit</a></td>
                                    <td>
                                        <form action="{{route('delete-data-admin', $item->id)}}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <button class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                    {{-- <td><a href="{{route('download-file-data', $item->file)}}"
                                    class="btn btn-info">Download</a></td> --}}
                                </tr>
                                @php
                                $nomor = $nomor + 1;
                                @endphp
                                @empty
                                <tr>
                                    <td colspan="3">Tidak Ada Data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{$data->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection