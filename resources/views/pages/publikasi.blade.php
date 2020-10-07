@extends('layouts.frontend.app')

@section('content')
    <!-- breadcrumb -->
    <div role="main">
        <div class="container-fluid background-publikasi">
            <div class="container background-datbase">
                <div class="flash-messages">
                </div>
                <div class="toolbar">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"><i class="fa fa-home"></i> Beranda</a></li>
                            <li class="breadcrumb-item active"><a href="/dataset">Publikasi</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <section class="module publikasi-module">
                            <div class="module-content ">
                                <div class="judul-publikasi">
                                    <br>
                                    <h5 style="margin-left: 14px;"><strong>Publikasi</strong> </h5>
                                </div>
                                <br>
                                <form class="list-group">
                                    <div class="col-12 row">
                                        <label for="inputPassword" class="col-md-2 col-form-label">Tahun :</label>
                                        <div class="col-md-5">
                                            <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            <option selected>2020</option>
                                            <option value="1">2019</option>
                                            <option value="2">2018</option>
                                            <option value="3">2017</option>
                                        </select>
                                        </div>
                                    </div>
                                </form>
                                <br>
                                <form class="list-group">
                                    <div class="col-12 row">
                                        <label for="inputPassword" class="col-md-2 col-form-label">Kata Kunci :</label>
                                        <div class="col-md-5">
                                            <input type="password" class="form-control" id="InputKataKunci" placeholder="kata kunci">
                                        </div>
                                        <a href="" class="btn btn-success">cari publikasi</a>
                                    </div>
                                </form>
                                <br><br>
                                <div class="list-group">
                                    <div class="col-md-12 row" style="border-bottom: 1px #002d58!important;">
                                        <div class="col-2">
                                            <img src="/images/publikasi/cover.jpg" alt="" style="width: 129px;">
                                            <a href="" class="btn btn-success" style="margin-top: 5px; width: 129px;">unduh</a>
                                        </div>
                                        <div class="col-10">
                                            <p><strong>Kenaikan Angka Kerja 2019</strong></p>
                                            <small>Tanggal Rilis : <span>2020-09-12</span></small>
                                            <br>
                                            <small>Ukuran FIle : <span>11 mb</span></small>
                                            <br><br>
                                            <p>Jumlah angkatan kerja meningkat. Berdasarkan data Badan Pusat Statistik (BPS), Senin (6/5/2019), angkatan kerja pada Februari 2019 sebanyak 136,18 juta orang, naik 2,24 juta orang dibandingkan Februari
                                                2018.
                                            </p>
                                        </div>
                                    </div>
                                    <div id="eris" style="height: 2px !important; width:100% !important; background-color:#002d58!important;opacity:0.1 !important;margin-top:10px;margin-bottom:10px;"></div>
                                    <div class="col-md-12 row" style="border-bottom: 1px #002d58!important;">
                                        <div class="col-2">
                                            <img src="/images/publikasi/cover.jpg" alt="" style="width: 129px;">
                                            <a href="" class="btn btn-success" style="margin-top: 5px; width: 129px;">unduh</a>
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Kenaikan Angka Kerja 2019</strong></p>
                                            <small>Tanggal Rilis : <span>2020-09-12</span></small>
                                            <br>
                                            <small>Ukuran FIle : <span>11 mb</span></small>
                                            <br><br>
                                            <p>Jumlah angkatan kerja meningkat. Berdasarkan data Badan Pusat Statistik (BPS), Senin (6/5/2019), angkatan kerja pada Februari 2019 sebanyak 136,18 juta orang, naik 2,24 juta orang dibandingkan Februari
                                                2018.
                                            </p>
                                        </div>
                                    </div>
                                    <div id="eris" style="height: 2px !important; width:100% !important; background-color:#002d58!important;opacity:0.1 !important;margin-top:10px;margin-bottom:10px;"></div>
                                    <div class="col-md-12 row" style="border-bottom: 1px #002d58!important;">
                                        <div class="col-2">
                                            <img src="/images/publikasi/cover.jpg" alt="" style="width: 129px;">
                                            <a href="" class="btn btn-success" style="margin-top: 5px; width: 129px;">unduh</a>
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Kenaikan Angka Kerja 2019</strong></p>
                                            <small>Tanggal Rilis : <span>2020-09-12</span></small>
                                            <br>
                                            <small>Ukuran FIle : <span>11 mb</span></small>
                                            <br><br>
                                            <p>Jumlah angkatan kerja meningkat. Berdasarkan data Badan Pusat Statistik (BPS), Senin (6/5/2019), angkatan kerja pada Februari 2019 sebanyak 136,18 juta orang, naik 2,24 juta orang dibandingkan Februari
                                                2018.
                                            </p>
                                        </div>
                                    </div>
                                    <div id="eris" style="height: 2px !important; width:100% !important; background-color:#002d58!important;opacity:0.1 !important;margin-top:10px;margin-bottom:10px;"></div>
                                    <div class="col-md-12 row" style="border-bottom: 1px #002d58!important;">
                                        <div class="col-2">
                                            <img src="/images/publikasi/cover.jpg" alt="" style="width: 129px;">
                                            <a href="" class="btn btn-success" style="margin-top: 5px; width: 129px;">unduh</a>
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Kenaikan Angka Kerja 2019</strong></p>
                                            <small>Tanggal Rilis : <span>2020-09-12</span></small>
                                            <br>
                                            <small>Ukuran FIle : <span>11 mb</span></small>
                                            <br><br>
                                            <p>Jumlah angkatan kerja meningkat. Berdasarkan data Badan Pusat Statistik (BPS), Senin (6/5/2019), angkatan kerja pada Februari 2019 sebanyak 136,18 juta orang, naik 2,24 juta orang dibandingkan Februari
                                                2018.
                                            </p>
                                        </div>
                                    </div>
                                    <div id="eris" style="height: 2px !important; width:100% !important; background-color:#002d58!important;opacity:0.1 !important;margin-top:10px;margin-bottom:10px;"></div>
                                    <div class="col-md-12 row" style="border-bottom: 1px #002d58!important;">
                                        <div class="col-2">
                                            <img src="/images/publikasi/cover.jpg" alt="" style="width: 129px;">
                                            <a href="" class="btn btn-success" style="margin-top: 5px; width: 129px;">unduh</a>
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Kenaikan Angka Kerja 2019</strong></p>
                                            <small>Tanggal Rilis : <span>2020-09-12</span></small>
                                            <br>
                                            <small>Ukuran FIle : <span>11 mb</span></small>
                                            <br><br>
                                            <p>Jumlah angkatan kerja meningkat. Berdasarkan data Badan Pusat Statistik (BPS), Senin (6/5/2019), angkatan kerja pada Februari 2019 sebanyak 136,18 juta orang, naik 2,24 juta orang dibandingkan Februari
                                                2018.
                                            </p>
                                        </div>
                                    </div>
                                    <div id="eris" style="height: 2px !important; width:100% !important; background-color:#002d58!important;opacity:0.1 !important;margin-top:10px;margin-bottom:10px;"></div>
                                    <div class="col-md-12 row" style="border-bottom: 1px #002d58!important;">
                                        <div class="col-2">
                                            <img src="/images/publikasi/cover.jpg" alt="" style="width: 129px;">
                                            <a href="" class="btn btn-success" style="margin-top: 5px; width: 129px;">unduh</a>
                                        </div>
                                        <div class="col-9">
                                            <p><strong>Kenaikan Angka Kerja 2019</strong></p>
                                            <small>Tanggal Rilis : <span>2020-09-12</span></small>
                                            <br>
                                            <small>Ukuran FIle : <span>11 mb</span></small>
                                            <br><br>
                                            <p>Jumlah angkatan kerja meningkat. Berdasarkan data Badan Pusat Statistik (BPS), Senin (6/5/2019), angkatan kerja pada Februari 2019 sebanyak 136,18 juta orang, naik 2,24 juta orang dibandingkan Februari
                                                2018.
                                            </p>
                                        </div>
                                    </div>
                                    <div id="eris" style="height: 2px !important; width:100% !important; background-color:#002d58!important;opacity:0.1 !important;margin-top:10px;margin-bottom:10px;"></div>
                                </div>
                                <br/>
                                <div aria-label="Page navigation example ">
                                    <nav aria-label="...">
                                        <ul class="pagination d-flex justify-content-center">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                            </li>
                                            <li class="page-item active" aria-current="page">
                                                <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                        </section>
                        <section class="module">
                            <div class="module-content">
                            </div>
                        </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection