@extends('layouts.dashboards.app')

@section('title')
Edit Galeri
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
                                    <label for="foto">Upload Gambar Lebih</label>
                                    <input type="file" class="form-control form-control-lg" id="foto" name="foto[]" multiple>
                                    <p class="text-danger">{{ $errors->first('foto') }}</p>
                                </div>

                                <div class="jumbotron container-fluid">
                                    <div class="row justify-content-center">
                                        <?php $total = count($images) >= 1 ? count($images) : 0; $div = $total >= 1 ? 12 / $total : 0; if($div <= 3) $div = 3; ?>
                                        @foreach($images as $key => $image)
                                        <div class="col-lg-<?= $div ?> col-md-<?= $div ?> col-sm-12 col-xs-12">
                                            <center>
                                                <img style="width: 50%;" src="<?= url('storage/files/photos/' . $image->picture) ?>" class="img-responsive thumb-image form-group">
                                            </center>
                                            <center>
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" data-id="{{ $image->id }}">Hapus</button>
                                            </center>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="init-ckeditor" cols="30" rows="10" class="form-control">{{$edit->description}}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Menghapus Gambar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menghapus gambar?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form id="delete-image" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('foot-content')
<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        var url = "{{ route('galeri.delete.image', ':id') }}";
        url = url.replace(':id', id);
        modal.find('.modal-footer #delete-image').attr('action', url);
    })
</script>
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

@section('js-deskripsi')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection