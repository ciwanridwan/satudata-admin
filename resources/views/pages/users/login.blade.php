<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Bizhub</title>

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link href="{{ asset('assets/style/main.css')}}" rel="stylesheet" />
</head>

<body>
    <!-- biru screen -->
    <div class="backround-biru">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <img src="{{ asset('assets/logo.png')}}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- form login -->
    <div class="form-login container align-items-center">
        <div class="row">
            <div class="col content-login text-left ">
                <h2 class="text-center">Masuk</h2>
                <label for="uname"><b>Username</b></label
          ><br />
          <input
            type="text"
            placeholder=""
            name="uname"
            required
            style="background-color: #f1f1f1; "
          /><br />

          <label for="psw" class="mt-4"><b>Password</b></label
          ><br />
          <input
            type="password"
            placeholder=""
            name="psw"
            required
            style="background-color: #f1f1f1"
          /><br />
          <div class="btn-login text-center mt-4">
            <a href="" class="btn btn-success">Login</a>
          </div>
          <div class="btn-login text-center mt-2 mb-4">
            <a href="" class="signup">Lupa Password ?</a>
          </div>
        </div>
      </div>
    </div>
    <div class="text-center mt-4 signup-reguest">
      <a href="{{route('users-register')}}">Tidak memiliki Akun? Daftar Sekarang</a>
    </div>

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