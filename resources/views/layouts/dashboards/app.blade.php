<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  {{-- <meta name="google-signin-client_id" content="81235167858-k856p385ijsisqieor05i2fiforrfsnl.apps.googleusercontent.com"> --}}
  <title>Satudata - @yield('title')</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('/src/assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('/src/assets/vendors/iconfonts/ionicons/dist/css/ionicons.css')}}">
  <link rel="stylesheet" href="{{asset('/src/assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css')}}">
  <link rel="stylesheet" href="{{asset('/src/assets/vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('/src/assets/vendors/css/vendor.bundle.addons.css')}}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('/src/assets/css/shared/style.css')}}">
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('/src/assets/css/demo_1/style.css')}}">
  <!-- End Layout styles -->
  <link rel="shortcut icon" href="{{ asset('/src/assets/images/logo-data2.ico')}}" />
</head>

<body>
  <div class="container-scroller">

    <!-- partial:partials/_navbar.html -->
    @include('layouts.dashboards.navbar.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('layouts.dashboards.navbar.sidebar')
      <!-- partial -->
      <div class="main-panel">

        {{-- CONTENT --}}
        @yield('content')
        {{-- END CONTENT --}}
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('layouts.dashboards.footer.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('/src/assets/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('/src/assets/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{asset('/src/assets/js/shared/off-canvas.js')}}"></script>
  <script src="{{asset('/src/assets/js/shared/misc.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('/src/assets/js/demo_1/dashboard.js')}}"></script>
  <!-- <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script> -->
  <script src="{{ asset('js/ckeditor/build/ckeditor.js') }}"></script>
  <script src="{{ asset('/src/assets/js/shared/chart.js')}}"></script>
  <script>
    function goBack() {
      window.history.back();
    }
  </script>
  {{-- <script type="text/javascript">
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
  </script> --}}
  @stack('foot-content')
  <!-- End custom js for this page-->
  @stack('js-province')
  @stack('js-deskripsi')
  @stack('chart-total-downloader')
  @stack('chart-visitor')
</body>

</html>