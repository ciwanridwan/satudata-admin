@extends('layouts.dashboards.app')

@section('title')
News Flash
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
                    <h4 class="card-title">New Flash</h4>
                    <a href="{{route('create-newflash-admin')}}" class="btn btn-primary">Tambah</a>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> No </th>
                                <th> Judul </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $nomor = 1;
                            @endphp
                            <tr>
                                @forelse ($newflash as $item)
                                <td>{{$nomor}}</td>
                                <td>{{$item->judul}}</td>
                                <td><a href="{{route('edit-newflash-admin', $item->judul)}}"
                                        class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="{{route('delete-newflash-admin', $item->id)}}" method="POST">
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
                    {{$newflash->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection