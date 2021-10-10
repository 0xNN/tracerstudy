@extends('layout')

@section('konten')
  <div class="row">
    <div class="col-sm-6">
      <div class="card-counter bg-default shadow mb-4">
        <i class="fas fa-user"></i>
        <span class="count-numbers">{{ $datas['jumlah_mhs'] }}</span>
        <span class="count-name">Jumlah Mahasiswa</span>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="card-counter bg-default shadow mb-4">
        <i class="fas fa-graduation-cap"></i>
        <span class="count-numbers">{{ $datas['jumlah_alumni'] }}</span>
        <span class="count-name">Jumlah Responden Kuesioner</span>
      </div>
    </div>
  </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="shadow" id="container-prodi"></div>
        </div>
        <div class="col-sm-6">
            <div class="shadow" id="container-kabupaten"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="shadow mt-3" id="container-provinsi"></div>
        </div>
        <div class="col-sm-6">
            <div class="shadow mt-3" id="container-jenispekerjaan"></div>
        </div>
    </div>
@endsection

@section('css')
  <style>
  .card-counter{
      box-shadow: 2px 2px 10px #DADADA;
      margin: 5px;
      padding: 20px 10px;
      background-color: #fff;
      height: 100px;
      border-radius: 5px;
      transition: .3s linear all;
    }

    .card-counter:hover{
      box-shadow: 4px 4px 20px #DADADA;
      transition: .3s linear all;
    }

    .card-counter.primary{
      background-color: #007bff;
      color: #FFF;
    }

    .card-counter.danger{
      background-color: #ef5350;
      color: #FFF;
    }

    .card-counter.success{
      background-color: #66bb6a;
      color: #FFF;
    }

    .card-counter.info{
      background-color: #26c6da;
      color: #FFF;
    }

    .card-counter i{
      font-size: 5em;
      opacity: 0.2;
    }

    .card-counter .count-numbers{
      position: absolute;
      right: 35px;
      top: 20px;
      font-size: 32px;
      display: block;
    }

    .card-counter .count-name{
      position: absolute;
      right: 35px;
      top: 65px;
      font-style: italic;
      text-transform: capitalize;
      opacity: 0.5;
      display: block;
      font-size: 18px;
    }
  </style>
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var perProdi = {!! json_encode($datas['jumlah_alumni_per_prodi']) !!}

    Highcharts.chart('container-prodi', {
        chart: {
            type: 'column'
        },
        title: {
            text: `Jumlah Alumni Per Prodi, ${new Date().getFullYear()}`
        },
        subtitle: {
            text: 'Sumber data : E-Tracer dan Siakad STIHPADA'
        },
        xAxis: {
            categories: [new Date().getFullYear()]
        },
        yAxis: {
            title: {
                text: 'Grafik Alumni per Prodi'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            data: [20]
        },{
            data: [45]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
<script type="text/javascript">
    var perProdi = {!! json_encode($datas['jumlah_alumni_per_prodi']) !!}

    Highcharts.chart('container-kabupaten', {
        chart: {
        type: 'column'
        },
        title: {
            text: `Jumlah Alumni per Kabupaten, ${new Date().getFullYear()}`
        },
        subtitle: {
            text: 'Sumber data : E-Tracer dan Siakad STIHPADA'
        },
        xAxis: {
            categories: [new Date().getFullYear()]
        },
        yAxis: {
            title: {
                text: 'Grafik Alumni pe Kabupaten'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            data: [20]
        },{
            data: [45]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
<script type="text/javascript">
    var perProdi = {!! json_encode($datas['jumlah_alumni_per_prodi']) !!}

    Highcharts.chart('container-provinsi', {
        chart: {
            type: 'column'
        },
        title: {
            text: `Jumlah Alumni per Provinsi, ${new Date().getFullYear()}`
        },
        subtitle: {
            text: 'Sumber data : E-Tracer dan Siakad STIHPADA'
        },
        xAxis: {
            categories: [new Date().getFullYear()]
        },
        yAxis: {
            title: {
                text: 'Grafik Alumni per Kabupaten'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            data: [20]
        },{
            data: [45]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
<script type="text/javascript">
    var perProdi = {!! json_encode($datas['jumlah_alumni_per_prodi']) !!}

    Highcharts.chart('container-jenispekerjaan', {
        chart: {
            type: 'column'
        },
        title: {
            text: `Jumlah Alumni yang sudah/belum mendapat Pekerjaan`
        },
        subtitle: {
            text: 'Sumber data : E-Tracer dan Siakad STIHPADA'
        },
        xAxis: {
            categories: [new Date().getFullYear()]
        },
        yAxis: {
            title: {
                text: 'Grafik Alumni yang sudah/belum mendapat Pekerjaan'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            data: [20]
        },{
            data: [45]
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
@endsection
