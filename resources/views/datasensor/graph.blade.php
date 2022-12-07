@extends('layout.topsideBar')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Grafik</h1>
                    <div class="form-group">
                        <label class="mt-3">Pilih Kelas</label>
                        <select id="pilihKelas" onchange="#" class="form-control select2" style="width: 100%;">
                            @foreach ($kelas as $item)
                                <option {{ $id == $item->id ? 'selected' : '' }} value="{{ $item->id }}" >{{ $item->name }}</option>
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
            <input value="#" type="date" id="min" name="min"
                class="form-control col-sm" /> &nbsp; &nbsp;
            To &nbsp; &nbsp; <input value="#" type="date" id="max"
                name="max" class="form-control col-sm" /> &nbsp; &nbsp;
            <button onclick="#" type="button"
                class="btn btn-success col-sm">Filter</button> &nbsp; &nbsp;
            <button type="button" onclick="#" class="btn btn-danger col-sm">
                Clear Filter</a>
        </div>
    </div>

    <!-- PH CHART -->
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
                    <canvas id="lineChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Temperature CHART -->
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
                    <canvas id="temperChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Humidity CHART -->
    <div class="container-fluid" style="padding: 20px;margin-bottom:-40px;">
        <div class="card card-info">
            <div class="card-header" style="background-color:#343A40;">
                <h3 class="card-title">Room Chart</h3>

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
                    <canvas id="humChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

    <!-- Oxygen CHART -->
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
                    <canvas id="OxyChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>


    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Data Grafik";
    </script>

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>

       
    </body>

    </html>
@endsection
