@extends('layouts.dashboards.app')

@section('title')
Edit Infograpik
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
                            <h4 class="card-title">Edit Infograpik</h4>
                            <form class="forms-sample" action="{{route('update-infograpik-admin', $edit->id)}}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{$edit->judul}}">
                                    <p class="text-danger">{{ $errors->first('judul') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="kategori_info_id">Kategori</label>
                                    <select class="form-control" id="kategori_info_id" name="kategori_info_id">
                                        @foreach ($kategori as $k)
                                        @if ($edit->kategori_info_id == $k->id)
                                        <option value="{{$k->id}}">{{$k->nama}}</option>
                                        @endif
                                        @endforeach
                                        @foreach ($kategori as $item)
                                        <option value="{{$item->id}}">{{$item->nama}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('kategori_info_id') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="province_id">Provinsi</label>
                                    <select class="form-control" id="province_id" name="province_id">
                                        @foreach ($provinces as $k)
                                        @if ($edit->province_id == $k->id)
                                        <option value="{{$k->id}}">{{$k->name}}</option>
                                        @endif
                                        @endforeach
                                        @foreach ($provinces as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="city_id">Pilih Kabupaten/Kota</label>
                                    <select class="form-control" id="city_id" name="city_id">
                                        @foreach ($city as $k)
                                        @if ($edit->city_id == $k->id)
                                        <option value="{{$k->id}}">{{$k->name}}</option>
                                        @endif
                                        @endforeach
                                        {{-- <option value="">Pilih Kabupaten/Kota</option> --}}
                                    </select>
                                    <p class="text-danger">{{ $errors->first('city_id') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="content">Konten</label>
                                    <textarea name="content" id="init-ckeditor" class="form-control">{{ $edit->content }}</textarea>
                                    <p class="text-danger">{{ $errors->first('content') }}</p>
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