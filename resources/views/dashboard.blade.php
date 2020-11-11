@extends('layouts.dashboards.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="p-4 border-bottom bg-light">
          {{-- <h4 class="card-title mb-0">Pengunjung Website</h4> --}}
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center pb-4">
            <h4 class="card-title mb-0">Pengunjung Website</h4>
            <div id="stacked-bar-traffic-legend"></div>
          </div>
          <p class="mb-4">Traffic Data Pengunjung Website Satudata</p>
          <canvas id="stackedbarChart" style="height:250px"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="p-4 border-bottom bg-light">
          {{-- <h4 class="card-title mb-0">Bar Chart</h4> --}}
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center pb-4">
            <h4 class="card-title mb-0">Data Downloader</h4>
            <div id="bar-traffic-legend"></div>
          </div>
          <p class="mb-4">Traffic User Yang Mendownload Data</p>
          <canvas id="barChart" style="height:250px"></canvas>
        </div>
      </div>
    </div>
   
  </div>
</div>
@endsection