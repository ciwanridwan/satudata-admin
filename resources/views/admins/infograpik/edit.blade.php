@extends('layouts.dashboards.app')

@section('title')
Edit Infografik
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
                            <h4 class="card-title">Edit Infografik</h4>
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
                                    <label for="content">Konten</label>
                                    <textarea name="content" id="init-ckeditor" class="form-control">{{ $edit->content }}</textarea>
                                    <p class="text-danger">{{ $errors->first('content') }}</p>
                                </div>

                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                            </form>
                            <button class="btn btn-info" onclick="goBack()">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js-province')
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
@endpush


@push('js-deskripsi')
<script type="text/javascript">
    // CKEDITOR.replace('init-ckeditor');
    ClassicEditor
    .create( document.querySelector( '#init-ckeditor' ), {

      toolbar: {
        items: [
        'heading',
        '|',
        'bold',
        'italic',
        'underline',
        'link',
        'bulletedList',
        'numberedList',
        'fontSize',
        '|',
        'indent',
        'outdent',
        'alignment',
        '|',
        'blockQuote',
        'insertTable',
        'mediaEmbed',
        'undo',
        'redo',
        'horizontalLine'
        ]
      },
      language: 'id',
      table: {
        contentToolbar: [
        'tableColumn',
        'tableRow',
        'mergeTableCells',
        'tableCellProperties',
        'tableProperties'
        ]
      },
      licenseKey: '',

    } )
    .then( editor => {
      window.editor = editor;
    } )
    .catch( error => {
      console.error( 'Oops, something went wrong!' );
      console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
      console.warn( 'Build id: ytelpisvsc0n-fpyjqvajdlqp' );
      console.error( error );
    } );
  </script>
  @endpush