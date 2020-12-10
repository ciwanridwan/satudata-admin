@extends('layouts.dashboards.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
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
  <div class="row">
    <div class="col-md-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="d-flex align-items-center pb-2">
                <div class="dot-indicator bg-danger mr-2"></div>
                <h5 class="mb-0">Total Pengunjung Website</h5>
              </div>
              <h4 class="font-weight-semibold">{{$totallyVisitor}}</h4>
              <div class="progress progress-md">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex align-items-center pb-2">
                <a href="{{route('export-excel-visitor')}}" class="btn btn-danger">Download</a>
              </div>
            </div>
            <div class="col-md-6 mt-4 mt-md-0">
              <div class="d-flex align-items-center pb-2">
                <div class="dot-indicator bg-info mr-2"></div>
                <h5 class="mb-0">Total Download Data</h5>
              </div>
              <h4 class="font-weight-semibold">{{$totallyData}}</h4>
              <div class="progress progress-md">
                <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="100"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex align-items-center pb-2">
                <a href="{{route('export-excel-data')}}" class="btn btn-info">Download</a>
              </div>
            </div>
            <br>
            <div class="col-md-6 mt-4 mt-md-0">
              <div class="d-flex align-items-center pb-2">
                <div class="dot-indicator bg-success mr-2"></div>
                <h5 class="mb-0">Total Download Publikasi</h5>
              </div>
              <h4 class="font-weight-semibold">{{$totallyPublication}}</h4>
              <div class="progress progress-md">
                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100"
                  aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              <div class="d-flex align-items-center pb-2">
                <a href="{{route('export-excel-publikasi')}}" class="btn btn-success">Download</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('chart-total-downloader')
<script type="text/javascript">
  var dataDownloader = <?php echo $dataDownloaders; ?>;
  var publikasiDownloader = <?php echo $publikasiDownloaders; ?>;
  if ($("#barChart").length) {
    var barChartCanvas = $("#barChart").get(0).getContext("2d");
    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [{
            label: "Data",
            backgroundColor: ChartColor[0],
            borderColor: ChartColor[0],
            borderWidth: 1,
            data: dataDownloader
          },
          {
            label: "Publikasi",
            backgroundColor: ChartColor[1],
            borderColor: ChartColor[1],
            borderWidth: 1,
            data: publikasiDownloader
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: false,
        categoryPercentage: 0.5,
        stacked: true,
        layout: {
          padding: {
            left: 0 ,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Bulan',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              fontColor: '#bfccda',
              stepSize: 50,
              min: 0,
              max: 150,
              autoSkip: false,
              autoSkipPadding: 15,
              maxRotation: 0,
              maxTicksLimit: 10
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Jumlah Pendownload Data',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              fontColor: '#bfccda',
              stepSize: 50,
              min: 0,
              max: 300,
              autoSkip: false,
              autoSkipPadding: 15,
              maxRotation: 0,
              maxTicksLimit: 10
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            console.log(chart.data.datasets[i]); // see what's inside the obj.
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
        elements: {
          point: {
            radius: 0
          }
        }
      }
    });
    document.getElementById('bar-traffic-legend').innerHTML = barChart.generateLegend();
  }
</script>
@endpush

@push('chart-visitor')
<script type="text/javascript">
  var visitor = <?php echo $visitors; ?>;
  if ($("#stackedbarChart").length) {
    var stackedbarChartCanvas = $("#stackedbarChart").get(0).getContext("2d");
    var stackedbarChart = new Chart(stackedbarChartCanvas, {
      type: 'bar',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
        datasets: [
          {
            label: "User",
            backgroundColor: ChartColor[2],
            borderColor: ChartColor[2],
            borderWidth: 1,
            data: visitor
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: false,
        categoryPercentage: 0.5,
        stacked: true,
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        scales: {
          xAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Bulan',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              fontColor: '#bfccda',
              stepSize: 50,
              min: 0,
              max: 150,
              autoSkip: false,
              autoSkipPadding: 15,
              maxRotation: 0,
              maxTicksLimit: 10
            },
            gridLines: {
              display: false,
              drawBorder: false,
              color: 'transparent',
              zeroLineColor: '#eeeeee'
            }
          }],
          yAxes: [{
            display: true,
            scaleLabel: {
              display: true,
              labelString: 'Jumlah Pengunjung',
              fontSize: 12,
              lineHeight: 2
            },
            ticks: {
              fontColor: '#bfccda',
              stepSize: 50,
              min: 0,
              max: 300,
              autoSkip: false,
              autoSkipPadding: 15,
              maxRotation: 0,
              maxTicksLimit: 10
            },
            gridLines: {
              drawBorder: false
            }
          }]
        },
        legend: {
          display: false
        },
        legendCallback: function (chart) {
          var text = [];
          text.push('<div class="chartjs-legend"><ul>');
          for (var i = 0; i < chart.data.datasets.length; i++) {
            console.log(chart.data.datasets[i]); // see what's inside the obj.
            text.push('<li>');
            text.push('<span style="background-color:' + chart.data.datasets[i].backgroundColor + '">' + '</span>');
            text.push(chart.data.datasets[i].label);
            text.push('</li>');
          }
          text.push('</ul></div>');
          return text.join("");
        },
        elements: {
          point: {
            radius: 0
          }
        }
      }
    });
    document.getElementById('stacked-bar-traffic-legend').innerHTML = stackedbarChart.generateLegend();
  }
</script>
@endpush