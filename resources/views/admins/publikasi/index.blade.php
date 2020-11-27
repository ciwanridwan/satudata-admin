@extends('layouts.dashboards.app')

@section('title', 'Publikasi')

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
                    <h4 class="card-title">Publikasi</h4>
                    <a href="{{route('create-publikasi-admin')}}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Thumbnail </th>
                                    <th> Judul </th>
                                    <th> Isi </th>
                                    <th> File </th>
                                    <th> Size File </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                <tr>
                                    @forelse ($publikasi as $key => $value)
                                    <td>{{$nomor}}</td>
                                    <td>
                                        <img class="thumb-image" src="{{ url('storage/' . $value->thumbnail) }}" style="cursor: pointer;"" onclick="window.open('<?= url('storage/' . $value->thumbnail) ?>', '_blank');">
                                    </td>
                                    <td>{{ \Str::limit($value->judul, 40) }}</td>
                                    <td>{{ \Str::limit($value->isi, 40) }}</td>
                                    <td>{{$value->file}}</td>
                                    <td>{{$value->size_file}}</td>
                                    <td><a href="{{route('edit-publikasi-admin', $value->judul)}}"
                                        class="btn btn-warning">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{route('delete-publikasi-admin', $value->id)}}" method="POST">
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
                    </div>
                    {{$publikasi->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
