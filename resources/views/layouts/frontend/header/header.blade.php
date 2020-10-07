<!-- news-notification -->
<div class="page-content news-notification">
    <p>
        News flash
        <a href="#">Data terbaru pengangguran tahun 2020 kuartal 1</a>
    </p>
</div>
<!-- navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark" id="navbar_top">
    <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/images/logo-navbar.png')}}" alt="" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active nav-item-left">
                <b> <a class="nav-link" href="{{url('/')}}">Beranda</a></b>
            </li>
            <li class="nav-item nav-item-left">
                <b> <a class="nav-link" href="{{ route('pages-data')}}">Data</a></b>
            </li>
            <li class="nav-item nav-item-left">
                <b> <a class="nav-link" href="{{ route('pages-infograpik')}}">Infografik</a></b>
            </li>
            <li class="nav-item nav-item-left">
                <b> <a class="nav-link" href="{{ route('pages-publikasi')}}">publikasi</a></b>
            </li>
            <li class="nav-item nav-item-left">
                <b> <a class="nav-link" href="{{ route('pages-galery')}}">Berita</a></b>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item nav-item-right">
                <b> <a class="nav-link" href="{{ url('user/register')}}">Daftar</a></b>
            </li>
            <li class="nav-item nav-item-right">
                <b> <a class="nav-link" href="{{ url('user/login')}}">Masuk</a></b>
            </li>
        </ul>
    </div>
</nav>