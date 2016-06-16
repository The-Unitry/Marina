@extends('layouts.admin')

@section('title')
{{ trans('menu.statistics') }}
@endsection

@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.6/Chart.bundle.js"></script>
<script>

</script>
<style type="text/css">

    .widget-panel {
        padding: 40px 20px;
        border-radius: 4px;
        position: relative;
        margin-bottom: 20px;
        background-color: #EEE;
        color: rgb(51, 51, 51);
        text-align: center;
    }

    .widget-panel .fa {
        color: #cccccc;
    }

    .btn btn-primary pull-right{
        display: none;
    }

    .widget-panel h2 {
        font-weight: 600;
        font-size: 32px;
        margin-top: 5px;
    }

    .widget-panel i {
        position: absolute;
        font-size: 60px;
        right: 0;
        bottom: 10px;
    }
</style>
<div class="row">
    <div class="col-md-12">
       <div class="row">
        <canvas id="turnoverChart" width="2" height="1"></canvas>
        <br>
        <hr>
        <canvas id="usersChart" width="2" height="1"></canvas>
        <br><br>
    </div>
</div>
<script>
    var turnoverctx = document.getElementById("turnoverChart");
    var userctx = document.getElementById("usersChart");

    var turnoverChartData = {
        labels: ["Januari", "Februari","Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"],
        datasets: [
        {
            label: "Omzet",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(75,193,75,0.4)",
            borderColor: "rgba(75,193,75,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,193,75,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,193,75,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [
            {{ $revenue['january'] }},
            {{ $revenue['february'] }},
            {{ $revenue['march'] }},
            {{ $revenue['april'] }},
            {{ $revenue['may'] }},
            {{ $revenue['june'] }},
            {{ $revenue['july'] }},
            {{ $revenue['august'] }},
            {{ $revenue['september'] }},
            {{ $revenue['october'] }},
            {{ $revenue['november'] }},
            {{ $revenue['december'] }}
            ],
        },

        ]
    };

    var turnoverLineChart = Chart.Line(turnoverctx, {
        data: turnoverChartData,
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Omzet   €'
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Periode'
                    },
                }]
            }
        }
    });

    var userChartData = {
        labels: ["Januari", "Februari","Maart", "April", "Mei", "Juni", "Juli", "Augustus", "September", "Oktober", "November", "December"],
        datasets: [
        {
            label: "Aantal gebruikers",
            fill: true,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [
            {{ $users['january'] }},
            {{ $users['february'] }},
            {{ $users['march'] }},
            {{ $users['april'] }},
            {{ $users['may'] }},
            {{ $users['june'] }},
            {{ $users['july'] }},
            {{ $users['august'] }},
            {{ $users['september'] }},
            {{ $users['october'] }},
            {{ $users['november'] }},
            {{ $users['december'] }}
            ],
        },

        ]
    };

    var userLineChart = Chart.Line(userctx, {
        data: userChartData,
        options: {
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Aantal gebruikers'
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Periode'
                    },
                }]
            }
        }
    });
</script>
</div>
@endsection
