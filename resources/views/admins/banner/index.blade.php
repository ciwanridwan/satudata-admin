@extends('layouts.dashboards.app')

@section('title')
Banner
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
                    <h4 class="card-title">Banner</h4>
                    <a href="{{route('create-banner-admin')}}" class="btn btn-primary">Tambah</a>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Banner </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $nomor = 1;
                                @endphp
                                <tr>
                                    @forelse ($banner as $item)
                                    <td>{{$nomor}}</td>
                                    <td><img src="{{ asset('storage/files/banners/' . $item->gambar)}}" alt=""
                                            style="width: 200px; height: 200px;"></td>
                                    <td><a href="{{route('edit-banner-admin', $item->gambar)}}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{route('delete-banner-admin', $item->id)}}" method="POST">
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
                    {{$banner->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection