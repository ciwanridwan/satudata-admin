@extends('layouts.frontend.app')

@section('content')
    <!-- corousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators mb-5">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="jumbotron jumbotron-fluid page-content">
                    <div class="container">
                        <div class="card-body">
                            <h1 class="display-4">Berita</h1>
                            <div class="row judul-berita">
                                <div class="col-4 col-lg-2">
                                    <p class="card-title">Kategori</p>
                                </div>
                                <div class="col-8 col-lg-10">
                                    <p class="card-title">Hari, 12 bulan 2020</p>
                                </div>
                            </div>
                            <h4 class="card-text">Penentuan Perpu oleh Kementrian Kehutanan</h4>
                            <p>is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br> when an unknown printer took a galley of type and scrambled it to
                                make
                                <br> a type specimen book. </p>
                            <button type="button" class="btn btn-light">Baca Selengkapnya</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="jumbotron jumbotron-fluid page-content">
                    <div class="container">
                        <div class="card-body">
                            <h1 class="display-4">Berita</h1>
                            <div class="row judul-berita">
                                <div class="col-4 col-lg-2">
                                    <p class="card-title">Kategori</p>
                                </div>
                                <div class="col-8 col-lg-10">
                                    <p class="card-title">Hari, 12 bulan 2020</p>
                                </div>
                            </div>
                            <h4 class="card-text">Penentuan Perpu oleh Kementrian Kehutanan</h4>
                            <p>is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br> when an unknown printer took a galley of type and scrambled it to
                                make
                                <br> a type specimen book. </p>
                            <button type="button" class="btn btn-light">Baca Selengkapnya</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="jumbotron jumbotron-fluid page-content">
                    <div class="container">
                        <div class="card-body">
                            <h1 class="display-4">Berita</h1>
                            <div class="row judul-berita">
                                <div class="col-4 col-lg-2">
                                    <p class="card-title">Kategori</p>
                                </div>
                                <div class="col-8 col-lg-10">
                                    <p class="card-title">Hari, 12 bulan 2020</p>
                                </div>
                            </div>
                            <h4 class="card-text">Penentuan Perpu oleh Kementrian Kehutanan</h4>
                            <p>is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,<br> when an unknown printer took a galley of type and scrambled it to
                                make
                                <br> a type specimen book. </p>
                            <button type="button" class="btn btn-light">Baca Selengkapnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navigation Flow -->
    <div class="nav-berita">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-0">
                </div>
                <div class="col-lg-6 mb-2 ">
                    <!-- Search form -->
                    <input class="form-control" type="text" placeholder="Cari Produk" aria-label="Search">
                </div>
                <div class="col-lg-4 ">
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         Semua Kategory
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- berita terbaru -->
    <div class="container berita">
        <div class="row section-berita">
            <div class="col-lg-10">
                <h1>Berita Terbaru</h1>
            </div>
            <div class="col-lg-2">
                <a href="" class="btn btn-primary">Lihat Lebih Banyak</a>
            </div>
        </div>
        <!-- berita background -->
        <div class="row berita-background mt-4 mb-4">
            <div class="col-lg-7 ">
                <div class="background-berita" style=" background-image: url('/images/berita/berita4.png');"></div>
            </div>
            <div class="col-lg-5">
                <div class="card-body">
                    <div class="row judul-berita">
                        <div class="col-7 col-lg-2">
                            <p class="card-title">Kategori</p>
                        </div>
                        <div class="col-5 col-lg-10">
                            <p class="card-title">Hari, 12 bulan 2020</p>
                        </div>
                    </div>
                    <h2 class="card-text">Penentuan Perpu oleh Kementrian Kehutanan</h2>
                    <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                        book. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    <a href="">baca selengkapnya</a>
                </div>
            </div>
        </div>
        <!-- detail berita -->
        <div class="row berita-details">
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news1.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">BLK Pati Mengadakan Pelatihan Kopi dan ...</h2>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news2.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">Peserta dilatih membuat minuman ...</h2>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news3.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">Rapat penentuan strategi ketenagakerjaan ...</h2>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="row berita-details">
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news1.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">BLK Pati Mengadakan Pelatihan Kopi dan ...</h2>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news2.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">Peserta dilatih membuat minuman ...</h2>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news3.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">Rapat penentuan strategi ketenagakerjaan ...</h2>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>

    <!-- berita terpopuler -->
    <div class="container berita">
        <div class="row section-berita">
            <div class="col-lg-10">
                <h1>Berita Terpopuler</h1>
            </div>
            <div class="col-lg-2">
                <a href="" class="btn btn-primary">Lihat Lebih Banyak</a>
            </div>
        </div>
        <!-- berita background -->
        <div class="row berita-background mt-4 mb-4">
            <div class="col-lg-7 ">
                <div class="background-berita" style=" background-image: url('/images/berita/berita4.png');"></div>
            </div>
            <div class="col-lg-5">
                <div class="card-body">
                    <div class="row judul-berita">
                        <div class="col-7 col-lg-2">
                            <p class="card-title">Kategori</p>
                        </div>
                        <div class="col-5 col-lg-10">
                            <p class="card-title">Hari, 12 bulan 2020</p>
                        </div>
                    </div>
                    <h2 class="card-text">Penentuan Perpu oleh Kementrian Kehutanan</h2>
                    <p>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen
                        book. is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, </p>
                    <a href="">baca selengkapnya</a>
                </div>
            </div>
        </div>
        <!-- detail berita -->
        <div class="row berita-details">
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news1.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">BLK Pati Mengadakan Pelatihan Kopi dan ...</h2>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news2.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">Peserta dilatih membuat minuman ...</h2>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news3.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">Rapat penentuan strategi ketenagakerjaan ...</h2>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <div class="row berita-details">
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news1.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">BLK Pati Mengadakan Pelatihan Kopi dan ...</h2>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news2.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">Peserta dilatih membuat minuman ...</h2>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-6 mt-5 mb-5">
                <a href="produk-details.html"></a>
                <div class="card">
                    <img class="card-img-top" src="images/news/news3.png" alt="Card image cap">
                    <div class="card-body">
                        <div class="row judul-berita">
                            <div class="col-7">
                                <p class="card-title">Kategori</p>
                            </div>
                            <div class="col-5">
                                <p class="card-title">Hari, 12 bulan 2020</p>
                            </div>
                        </div>
                        <h2 class="card-text">Rapat penentuan strategi ketenagakerjaan ...</h2>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>
@endsection