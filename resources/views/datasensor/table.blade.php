@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Table Data</h1>
                    <div class="form-group">
                        <label class="mt-3">Pilih Kelas</label>
                        <select id="pilihKelas" onChange="#" class="form-control select2" style="width: 100%;">
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
                        <li class="breadcrumb-item active">Table</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="card-title">Data Sensor</p>

                            <div class="container-fluid mt-5" style="padding:0 30px 0 30px">
                                <div id="date_filter" class="row">
                                    <input value="{{ $from }}" type="date" id="min" name="min"
                                        class="form-control col-sm" /> &nbsp; &nbsp;
                                    To &nbsp; &nbsp; <input value="{{ $to }}" type="date" id="max"
                                        name="max" class="form-control col-sm" /> &nbsp; &nbsp;
                                    <button onclick="handleDateChange()" type="button"
                                        class="btn btn-success col-sm">Filter</button> &nbsp; &nbsp;
                                    <button type="button" onclick="handleSelectChange()" class="btn btn-danger col-sm">
                                        Clear Filter</a>
                                </div>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Timestamp</th>
                                        <th>Humidity</th>
                                        <th>Projector</th>
                                        <th>Temperature</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $item->created_at }}</td>
                                            <td>{{ $item->humidity }}</td>
                                            <td>{{ $item->projector }}</td>
                                            <td>{{ $item->temperature }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "Data Table";

        function handleSelectChange(event) {
            window.location.href = "{{ url('/datasensor/table/?id=') }}" + $("#pilihKelas").val();
        }

        function handleDateChange(event) {
            var min = document.getElementById("min").value;
            var max = document.getElementById("max").value;
            window.location.href = "{{ url('/datasensor/table/?id=') }}" + $("#pilihKelas").val() + ('&from=') + min + (
                '&to=') + max;
        };
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
                order: [
                    [0, 'desc']
                ],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
