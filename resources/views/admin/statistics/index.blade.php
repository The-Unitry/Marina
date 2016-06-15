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
        <div class="col-sm-12">
            <div class="input-daterange input-group">
                    <input type="text" class="input-sm form-control datepicker" name="start" id="start" value="{{ date('Y-m-d') }}">
                   <span class="input-group-addon">tot</span>
                    <input type="text" class="input-sm form-control datepicker" name="end" id="end" value="{{ date('Y-m-d') }}">
            </div>
        </div>

        <br><br><br><br>
        <div class="col-md-12">
            <div class="row">
                <a href="/admin/user">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget-panel">
                            <h2 class="text-white">0</h2>
                            <div class="text-white">{{ trans_choice('columns.transients', 0) }}</div>
                        </div>
                    </div>
                </a>

                <a href="/admin/user">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget-panel">
                            <h2 class="text-white">0</h2>
                            <div class="text-white">{{ trans_choice('columns.berth_holders', 0) }}</div>
                        </div>
                    </div>
                </a>

                <a href="/admin/boat">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget-panel">
                            <h2 class="text-white">0</h2>
                            <div class="text-white">{{ trans_choice('columns.boats', 0) }}</div>
                        </div>
                    </div>
                </a>

                <a href="/admin/user">
                    <div class="col-md-3 col-sm-6">
                        <div class="widget-panel">
                            <h2 class="text-white">0</h2>
                            <div class="text-white">{{ trans_choice('columns.users', 0) }}</div>
                        </div>
                    </div>
                </a>
            </div>

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
                                    labelString: 'Omzet'
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
                            data: [100, 110, 120, 130, 140, 150, 230, 310, 390, 470, 550, 630, 710],
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
