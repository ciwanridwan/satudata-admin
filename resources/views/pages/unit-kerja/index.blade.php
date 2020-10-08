@extends('layouts.dashboards.app')

@section('title')
Unit Kerja
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
                    <h4 class="card-title">Unit Kerja</h4>
                    {{-- <p class="card-description"> Add class <code>.table-striped</code> </p> --}}
                    <a href="{{route('create-UnitKerja')}}" class="btn btn-primary" type="button">Tambah</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Unit </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            <tr>
                                @forelse ($unitKerja as $item)
                                <td>{{$nomor}}</td>
                                <td>{{$item->nama}}</td>
                                <td><a href="{{route('edit-UnitKerja', $item->nama)}}" class="btn btn-warning">Edit</a>
                                </td>
                                <td>
                                    <form action="{{route('delete-UnitKerja', $item->id)}}" method="POST">
                                        @csrf
                                        @method('POST') <button class="btn btn-danger">Hapus</button>
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
            </div>
        </div>
    </div>
</div>
@endsection