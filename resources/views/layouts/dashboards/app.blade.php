<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="google-signin-client_id" content="81235167858-k856p385ijsisqieor05i2fiforrfsnl.apps.googleusercontent.com">
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

    {{-- Dependencies of Google Analytics --}}
    {{-- <header>
      <div id="embed-api-auth-container"></div>
      <div id="view-selector-container"></div>
      <div id="view-name"></div>
      <div id="active-users-container"></div>
    </header> --}}
    {{-- End Dependencies of Google Analytics --}}

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
  @yield('foot-content')
  <!-- End custom js for this page-->
  @yield('js-province')
  @yield('js-deskripsi')


  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/google-analytics/ga.js')}}"></script>\
  <script src="{{ asset('js/google-analytics/view-selector2.js')}}"></script>
  <script src="{{ asset('js/google-analytics/date-range-selector.js')}}"></script>
  <script src="{{ asset('js/google-analytics/active-users.js')}}"></script> --}}

  <!-- Google Analytics -->
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
    
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview');
    </script>
  <!-- End Google Analytics -->
  

  <script async src="https://www.google-analytics.com/analytics.js"></script>
  <script async src="{{ asset('/js/autotrack/autotrack.js')}}"></script>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</body>

</html>