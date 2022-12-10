@extends('layout.topsideBar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Grafik</h1>
                    <div class="form-group">
                        <label class="mt-3">Pilih Kelas</label>
                        <select id="pilihKelas" onchange="handleSelectChange()" class="form-control select2" style="width: 100%;">
                            @foreach ($kelas as $item)
                                <option {{ $id == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Grafik</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid" style="padding:0 30px 0 30px">
        <div id="date_filter" class="row">
            <input value="{{ $from }}" type="date" id="min" name="min" class="form-control col-sm" />
            &nbsp; &nbsp;
            To &nbsp; &nbsp; <input value="{{ $to }}" type="date" id="max" name="max"
                class="form-control col-sm" /> &nbsp; &nbsp;
            <button onclick="handleDateChange()" type="button" class="btn btn-success col-sm">Filter</button> &nbsp; &nbsp;
            <button type="button" onclick="handleSelectChange1()" class="btn btn-danger col-sm">
                Clear Filter</a>
        </div>
    </div>

    <!-- Humidity CHART -->
    <div class="container-fluid" style="padding: 20px; margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Humidity Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="humidityChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Projector CHART -->
    <div class="container-fluid" style="padding: 20px;margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Projector Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="projectorChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Termperature CHART -->
    <div class="container-fluid" style="padding: 20px;margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Temperature Chart</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="temperatureChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Data Grafik";

        function handleSelectChange1(event) {
            window.location.href = "{{ url('/datasensor/grafik/?kelas=') }}" + $("#pilihKelas").val();
        }

        function handleDateChange(event) {
            var min = document.getElementById("min").value;
            var max = document.getElementById("max").value;
            window.location.href = "{{ url('/datasensor/grafik/?kelas=') }}" + $("#pilihKelas").val() + ('&from=') + min + (
                '&to=') + max;
        };

        // get data from controller json encode
        var data = {!! json_encode($data) !!};

        //copy array to new array
        var temperatureArray = [];
        for (var i = data.length-1; i >= 0; i--) {
            temperatureArray.push(data[i].temperature);
        }

        var humidityArray = [];
        for (var i = data.length-1; i >= 0; i--) {

            humidityArray.push(data[i].humidity);
        }

        var projectorArray = [];    
        for (var i = data.length-1; i >= 0; i--) {

            projectorArray.push(data[i].projector);
        }

        var timeArray = [];
        for (var i = data.length-1; i >= 0; i--) {

            var date = new Date(data[i].created_at);
            var time = date.getDate() + "/" + date.getMonth() + "/" + date.getFullYear() + " " + date.getHours() + ":" +
                date.getMinutes() + ":" + date.getSeconds();
            timeArray.push(time);
        }



        //--------------
        //- Humidity CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasHum = $('#humidityChart').get(0).getContext('2d')

        var lineChartDataHum = {
            labels: timeArray,
            datasets: [{
                label: 'Humidity',
                fill: false,
                tension: 0,
                backgroundColor: '#fca903',
                borderColor: '#fca903',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: humidityArray
            }, ]
        }

        var lineChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            },
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasHum, {
            type: 'line',
            data: lineChartDataHum,
            options: lineChartOptions
        })


        //--------------
        //- Projector CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasProj = $('#projectorChart').get(0).getContext('2d')

        var lineChartDataProj = {
            labels: timeArray,
            datasets: [{
                label: 'Projector',
                fill: false,
                tension: 0,
                backgroundColor: '#DC3545',
                borderColor: '#DC3545',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: projectorArray
            }, ]
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasProj, {
            type: 'line',
            data: lineChartDataProj,
            options: lineChartOptions
        })
  

        //--------------
        //- Temperature CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var lineChartCanvasTemp = $('#temperatureChart').get(0).getContext('2d')

        var lineChartDataTemp = {
            labels: timeArray,
            datasets: [{
                label: 'Temperature',
                fill: false,
                tension: 0,
                backgroundColor: '#5cceff',
                borderColor: '#5cceff',
                pointRadius: true,
                hoverRadius: 8,
                borderWidth: 3,
                data: temperatureArray
            }, ]
        }

        // This will get the first returned node in the jQuery collection.
        new Chart(lineChartCanvasTemp, {
            type: 'line',
            data: lineChartDataTemp,
            options: lineChartOptions
        })
    </script>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->


    </body>

    </html>
@endsection
