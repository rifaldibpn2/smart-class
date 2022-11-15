@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">RFID Data</h1>
                    {{-- <div class="form-group">
                        <label class="mt-3">Pilih Kolam</label>
                        <select id="pilihKolam" onchange="handleSelectChange()" class="form-control select2"
                            style="width: 100%;">

                            @foreach ($kolam as $key)
                                <option value="{{ $key->id }}" {{ $id == $key->id ? 'selected' : '' }}>
                                    {{ $key->name }}</option>
                            @endforeach

                        </select>
                    </div> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">RFID</li>
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
                            <p class="card-title">RFID</p>
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
                                        <th>No</th>
                                        <th>RFID</th>
                                        <th>Name</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rfid as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->rfid_number }}</td>
                                            <td>{{ $item->user }}</td>
                                            <td>{{ $item->date }}</td>
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
            window.location.href = "{{ url('/datasensor/table/?pool=') }}" + $("#pilihKolam").val();
        }

        function handleDateChange(event) {
            var min = document.getElementById("min").value;
            var max = document.getElementById("max").value;
            window.location.href = "{{ url('/datasensor/table/?pool=') }}" + $("#pilihKolam").val() + ('&from=') + min + (
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