@extends('layouts.dashboards.app')

@section('title')
Galeri
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
                            <h4 class="card-title">Input Galeri</h4>
                            <form class="forms-sample" action="{{route('update-galeri-admin', $edit->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        placeholder=".........." value="{{$edit->judul}}">
                                    <p class="text-danger">{{ $errors->first('judul') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_galery_id">Kategori</label>
                                    <select class="form-control" id="kategori_galery_id" name="kategori_galery_id">
                                        
                                        @foreach ($kategoriGaleri as $item)
                                        @if ($edit->kategori_galery_id == $item->id)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endif
                                        @endforeach
                                        
                                        @foreach ($kategoriGaleri as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('kategori_galery_id') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="foto">foto</label>
                                    <input type="file" class="form-control form-control-lg" id="foto" name="foto"
                                        placeholder=".........." value="{{$edit->foto}}">
                                    <p class="text-danger">{{ $errors->first('foto') }}</p>
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

@section('js-province')
    <script>
        $('#province_id').on('change', function() {
            $.ajax({
                url: "{{ url('/api/city') }}",
                type: "GET",
                data: { province_id: $(this).val() },
                success: function(html){
    
                    $('#city_id').empty()
                    $('#city_id').append('<option value="">Pilih Kabupaten/Kota</option>')
                    $.each(html.data, function(key, item) {
                        $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                    })
                }
            });
        })
    </script>
@endsection