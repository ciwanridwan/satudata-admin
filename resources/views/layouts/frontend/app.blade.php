<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>satudata</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('assets/style/main.css')}}" rel="stylesheet" />
</head>

<body id="ericsnth">
    {{-- INCLUDE HEADER --}}
   @include('layouts.frontend.header.header')
   {{-- END INCLUDE HEADER --}}

    {{-- CONTENT --}}
    @yield('content')
    {{-- END CONTENT --}}

    {{-- FOOTER --}}
    @include('layouts.frontend.footer.footer')
    {{-- END FOOTER --}}
        <!-- Bootstrap core JavaScript -->
        <script src="{{ asset('assets/vendor/jquery/jquery.slim.min.js')}}"></script>
        <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <script>
            ///////////////// fixed menu on scroll for desktop
                    if ($(window).width() > 992) {
                        $(window).scroll(function() {
                            if ($(this).scrollTop() > 35) {
                                $("#navbar_top").addClass("fixed-top");
                                // add padding top to show content behind navbar
                                $("body").css("padding-top", $(".navbar").outerHeight() + "px");
                            } else {
                                $("#navbar_top").removeClass("fixed-top");
                                // remove padding top from body
                                $("body").css("padding-top", "0");
                            }
                        });
                    } // end if
        </script>

</body>

</html>