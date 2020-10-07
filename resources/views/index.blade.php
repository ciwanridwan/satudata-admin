@extends('layouts.frontend.app')

@section('content')
    <!-- page content -->
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid page-content">
        <div class="container text-center">
            <h1 class="display-4 text-center"> <strong>SATU DATA</strong> </h1>
            <p class="lead">
                <strong>Sistem Data terintegrasi ketenagakerjaan Republik Indonesia,yang berfungsi sebagai kanal Big
                    Data sekaligus<br>menyajikan data terkait dengan perkembangan ketenagakerjaan Indonesia. Satu data
                    Ketenagakerjaan juga berfungsi
                    sebagai pusat informasi data terpadu terkait dengan tenaga kerja Indonesia.</strong>
            </p>
            <form method="GET" action="dataset.html">
                <div class="form-group">
                    <input type="text" class="form-control" id="e_keyword"
                        placeholder="Masukan kata kunci pencarian ..." name="q">
                </div>
                <button type="submit" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="mx-3">
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg><b>Cari Data</b>&nbsp; &nbsp; &nbsp;
                </button>
            </form>
        </div>
    </div>

    <!-- data -->
    <div class="">
        <!-- <section class="featured">
                    <div class="container featured-pad">
                        <div class="row">
                            <div class="col-md-7">
                                <h1 class="text-white">Data Indonesia Dalam Satu Portal</h1>
                                <p class="text-white largetext">Temukan data Pemerintah dengan mudah!</p>
                                <form method="GET" action="https://data.go.id/dataset">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="e_keyword" placeholder="Masukan kata kunci pencarian ..." name="q">
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3" >
                        <circle cx="10.5" cy="10.5" r="7.5"></circle>
                        <line x1="21" y1="21" x2="15.8" y2="15.8"></line>
                    </svg><b>Cari Data</b>&nbsp; &nbsp; &nbsp;
                </button>
                                </form>
                            </div>
                            <div class="col-md-5"></div>
                        </div>
                    </div>
                </section> -->
        <section class="wow-pad bg-white">
            <div class="container">
                <div class="container">
                    <br />
                    <h1 class="text-center">
                        Kemnaker Dalam Data
                    </h1><br />
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <div class='tableauPlaceholder' id='viz1548227850897' style='position: relative'><noscript>
                                    <a href='#'>
                                        <img alt=' '
                                            src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;SD&#47;SDI-01&#47;Penduduk&#47;1_rss.png'
                                            style='border: none' />
                                    </a></noscript>
                                <object class='tableauViz' style='display:none;'>
                                    <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
                                    <param name='embed_code_version' value='3' />
                                    <param name='site_root' value='' />
                                    <param name='name' value='SDI-01&#47;Penduduk' />
                                    <param name='tabs' value='no' />
                                    <param name='toolbar' value='no' />
                                    <param name='static_image'
                                        value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;SD&#47;SDI-01&#47;Penduduk&#47;1.png' />
                                    <param name='animate_transition' value='yes' />
                                    <param name='display_static_image' value='yes' />
                                    <param name='display_spinner' value='yes' />
                                    <param name='display_overlay' value='yes' />
                                    <param name='display_count' value='yes' />
                                </object></div>
                            <script type='text/javascript'>
                                var divElement = document.getElementById('viz1548227850897');
                                        var vizElement = divElement.getElementsByTagName('object')[0];
                                        vizElement.style.width = '100%';
                                        vizElement.style.height = (divElement.offsetWidth * 0.75) + 'px';
                                        var scriptElement = document.createElement('script');
                                        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
                                        vizElement.parentNode.insertBefore(scriptElement, vizElement);
                            </script>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <div class='tableauPlaceholder' id='viz1548228042824' style='position: relative'><noscript>
                                    <a href='#'>
                                        <img alt=' '
                                            src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;SD&#47;SDI-01&#47;Sheet4&#47;1_rss.png'
                                            style='border: none' />
                                    </a></noscript>
                                <object class='tableauViz' style='display:none;'>
                                    <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
                                    <param name='embed_code_version' value='3' />
                                    <param name='site_root' value='' />
                                    <param name='name' value='SDI-01&#47;Sheet4' />
                                    <param name='tabs' value='no' />
                                    <param name='toolbar' value='no' />
                                    <param name='static_image'
                                        value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;SD&#47;SDI-01&#47;Sheet4&#47;1.png' />
                                    <param name='animate_transition' value='yes' />
                                    <param name='display_static_image' value='yes' />
                                    <param name='display_spinner' value='yes' />
                                    <param name='display_overlay' value='yes' />
                                    <param name='display_count' value='yes' />
                                    <param name='filter' value='publish=yes' />
                                </object>
                            </div>
                            <script type='text/javascript'>
                                var divElement = document.getElementById('viz1548228042824');
                                        var vizElement = divElement.getElementsByTagName('object')[0];
                                        vizElement.style.width = '100%';
                                        vizElement.style.height = (divElement.offsetWidth * 0.75) + 'px';
                                        var scriptElement = document.createElement('script');
                                        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
                                        vizElement.parentNode.insertBefore(scriptElement, vizElement);
                            </script>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <div class='tableauPlaceholder' id='viz1548228389674' style='position: relative'>
                                <noscript><a href='#'>
                                        <img alt=' '
                                            src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;SD&#47;SDI-01&#47;KemudahanBerusaha&#47;1_rss.png'
                                            style='border: none' />
                                    </a></noscript>
                                <object class='tableauViz' style='display:none;'>
                                    <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
                                    <param name='embed_code_version' value='3' />
                                    <param name='site_root' value='' />
                                    <param name='name' value='SDI-01&#47;KemudahanBerusaha' />
                                    <param name='tabs' value='no' />
                                    <param name='toolbar' value='no' />
                                    <param name='static_image'
                                        value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;SD&#47;SDI-01&#47;KemudahanBerusaha&#47;1.png' />
                                    <param name='animate_transition' value='yes' />
                                    <param name='display_static_image' value='yes' />
                                    <param name='display_spinner' value='yes' />
                                    <param name='display_overlay' value='yes' />
                                    <param name='display_count' value='yes' />
                                </object>
                            </div>
                            <script type='text/javascript'>
                                var divElement = document.getElementById('viz1548228389674');
                                        var vizElement = divElement.getElementsByTagName('object')[0];
                                        if (divElement.offsetWidth > 800) {
                                            vizElement.style.width = '100%';
                                            vizElement.style.height = (divElement.offsetWidth * 0.75) + 'px';
                                        } else if (divElement.offsetWidth > 500) {
                                            vizElement.style.width = '100%';
                                            vizElement.style.height = (divElement.offsetWidth * 0.75) + 'px';
                                        } else {
                                            vizElement.style.width = '100%';
                                            vizElement.style.height = (divElement.offsetWidth * 1.77) + 'px';
                                        }
                                        var scriptElement = document.createElement('script');
                                        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
                                        vizElement.parentNode.insertBefore(scriptElement, vizElement);
                            </script>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-6 col-sm-12 col-xs-12">
                            <div class='tableauPlaceholder' id='viz1548228626355' style='position: relative'><noscript>
                                    <a href='#'>
                                        <img alt=' '
                                            src='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;SD&#47;SDI-01&#47;IPM&#47;1_rss.png'
                                            style='border: none' />
                                    </a></noscript>
                                <object class='tableauViz' style='display:none;'>
                                    <param name='host_url' value='https%3A%2F%2Fpublic.tableau.com%2F' />
                                    <param name='embed_code_version' value='3' />
                                    <param name='site_root' value='' />
                                    <param name='name' value='SDI-01&#47;IPM' />
                                    <param name='tabs' value='no' />
                                    <param name='toolbar' value='no' />
                                    <param name='static_image'
                                        value='https:&#47;&#47;public.tableau.com&#47;static&#47;images&#47;SD&#47;SDI-01&#47;IPM&#47;1.png' />
                                    <param name='animate_transition' value='yes' />
                                    <param name='display_static_image' value='yes' />
                                    <param name='display_spinner' value='yes' />
                                    <param name='display_overlay' value='yes' />
                                    <param name='display_count' value='yes' />
                                </object>
                            </div>
                            <script type='text/javascript'>
                                var divElement = document.getElementById('viz1548228626355');
                                        var vizElement = divElement.getElementsByTagName('object')[0];
                                        vizElement.style.width = '100%';
                                        vizElement.style.height = (divElement.offsetWidth * 0.75) + 'px';
                                        var scriptElement = document.createElement('script');
                                        scriptElement.src = 'https://public.tableau.com/javascripts/api/viz_v1.js';
                                        vizElement.parentNode.insertBefore(scriptElement, vizElement);
                            </script>
                        </div>
                    </div>
                </div>
        </section>
        <!-- benefit -->
        <div class="benefit mb-4" style="margin-top: 80px;">
            <h1>Layanan Kami</h1>
            <div class="container">
                <div class="row">
                    <div class="benefit-bg-1 col-lg-5"></div>
                    <div class="col-lg-7"></div>
                </div>
                <div class="benefit-content row">
                    <div class="col-lg-2"></div>
                    <div class="benefit-content-description benefit-bg-2 col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{asset('assets/images/home/benefit-icon1.svg')}}" alt="" class="mt-4 mb-4">
                                <h3 class="mt-2 mb-2">Pengumpulan Data Daring</h3>
                                <p>Pengumpulan data daring dilakukan di dalam satudata dan diproses langsung melalui
                                    metode-metode statistik dari berbagai pakar statistika</p>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{asset('assets/images/home/benefit-icon3.svg')}}" alt="" class="mt-4 mb-4">
                                <h3 class="mt-2 mb-2">Analisis Data</h3>
                                <p>Analisis data melalui Data Science ditampilkan beserta data yang dicari</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6"><img src="{{asset('assets/images/home/benefit-icon2.svg')}}" alt="" class="mt-4 mb-4">
                                <h3 class="mt-2 mb-2">Klasifikasi Data</h3>
                                <p>Data telah terklasifkasi sehingga memudahkan pengguna untuk menggunakan data tersebut
                                    demi keperluan akademik</p>
                            </div>
                            <div class="col-lg-6">
                                <img src="{{asset('assets/images/home/benefit-icon4.svg')}}" alt="" class="mt-4 mb-4">
                                <h3 class="mt-2 mb-2">Penyajian</h3>
                                <p>data disajikan seemenarik mungkin melalui metode statistik sehingga memudahkan
                                    pengguna untuk membaca data tersebut</p>
                            </div>
                        </div>
                        <img src="{{asset('assets/images/home/benefit-icon2.svg')}}" alt="" class="mt-4 mb-4">
                        <h3 class="mt-2 mb-2">Permintaan Data untuk Akademik</h3>
                        <p>Satudata memberikan layanan untuk sivitas akademika untuk mengajukan permintaan data untuk
                            keperluan pendidikan</p>
                    </div>
                    <div class="col-lg-2"></div>
                </div>
                <div class="row">
                    <div class=" col-lg-7"></div>
                    <div class="benefit-bg-3 col-lg-5"></div>
                </div>
            </div>
        </div>
        <!-- detail infografis -->
        <div class="container berita">
            <div class="row section-berita">
                <div class="col-lg-10">
                    <h1>Data Terbaru</h1>
                </div>
                <div class="col-lg-2">
                    <a href="" class="btn btn-primary">Lihat Lebih Banyak</a>
                </div>
            </div>
            <!-- detail berita -->
            <div class="row berita-details">
                <div class="col-lg-4 col-md-6 mt-5 mb-5">
                    <a href="produk-details.html"></a>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/berita/berita1.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="row judul-berita">
                                <div class="col-7">
                                    <p class="card-title">Kategori</p>
                                </div>
                                <div class="col-5">
                                    <p class="card-title">Hari, 12 bulan 2020</p>
                                </div>
                            </div>
                            <h2 class="card-text">Data Pencari Kerja Kuartal 1 tahun 2020..</h2>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mb-5">
                    <a href="produk-details.html"></a>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/berita/berita2.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="row judul-berita">
                                <div class="col-7">
                                    <p class="card-title">Kategori</p>
                                </div>
                                <div class="col-5">
                                    <p class="card-title">Hari, 12 bulan 2020</p>
                                </div>
                            </div>
                            <h2 class="card-text">Data tenaga kerja asing tahun 2019...</h2>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6 mt-5 mb-5">
                    <a href="produk-details.html"></a>
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('assets/images/berita/berita3.png')}}" alt="Card image cap">
                        <div class="card-body">
                            <div class="row judul-berita">
                                <div class="col-7">
                                    <p class="card-title">Kategori</p>
                                </div>
                                <div class="col-5">
                                    <p class="card-title">Hari, 12 bulan 2020</p>
                                </div>
                            </div>
                            <h2 class="card-text">Data penempatan kerja dari LPTKS 2020...</h2>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
            <div class="row buttonnext text-center">
                <a href="#" class="previous round">&#8249;</a>
                <a href="#" class="next round">&#8250;</a>
            </div>
        </div>
@endsection