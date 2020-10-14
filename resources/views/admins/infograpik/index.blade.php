@extends('layouts.dashboards.app')

@section('title')
Infograpik
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
                    <h4 class="card-title">Infograpik</h4>
                    <a href="{{route('create-infograpik-admin')}}" class="btn btn-primary">Tambah</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Judul </th>
                                <th> Kategori </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            <tr>
                                @forelse ($infograpik as $item)
                                <td>{{$nomor}}</td>
                                <td>{{$item->judul}}</td>
                                @foreach ($kategori as $k)
                                    @if ($k->id == $item->kategori_info_id)
                                    <td>{{$k->nama}}</td>
                                    @endif
                                @endforeach
                                <td><a href="{{route('edit-infograpik-admin', $item->judul)}}"
                                        class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="{{route('delete-infograpik-admin', $item->id)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
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
                    {{$infograpik->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection