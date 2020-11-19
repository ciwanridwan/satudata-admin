@extends('layouts.dashboards.app')

@section('title')
Dashboard
@endsection

@section('content')
<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        {{-- <div class="p-4 border-bottom bg-light">
          <h4 class="card-title mb-0">Pengunjung Website</h4>
        </div> --}}
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
        {{-- <div class="p-4 border-bottom bg-light">
          <h4 class="card-title mb-0">Bar Chart</h4>
        </div> --}}
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

@section('chart-total-downloader')
<script>
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
              autoSkip: true,
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
              autoSkip: true,
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
@endsection

@section('chart-visitor')
<script>
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
            backgroundColor: ChartColor[1],
            borderColor: ChartColor[1],
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
              autoSkip: true,
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
              autoSkip: true,
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
@endsection