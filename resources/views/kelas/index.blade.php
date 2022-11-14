@extends('layout.topsideBar')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">kelas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header" id="formInput">

                            {{-- <h3 class="card-title">Kelas</h3> --}}
                            <a type="button" href="{{ url('kelas/create') }}" class="btn btn-success float-right"><i
                                    class="fas fa-plus"></i> Tambah
                                Data</a>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Temperature</th>
                                        <th>LDR</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Kelas as $kelas)
                                        <tr>
                                            <td>{{ $kelas->id }}</td>
                                            <td>{{ $kelas->name }}</td>
                                            <td>{{ $kelas->desc }}</td>
                                            <td>{{ $kelas->temperature }}</td>
                                            <td>{{ $kelas->ldr }}</td>
                                            <td>{{ $kelas->created_at }}</td>
                                            <td><a href="{{ route('kelas.edit', $kelas->id) }}" class="btn btn-info">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
                                                <form action="{{ route('kelas.destroy', $kelas->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

    <script type="text/javascript">
        document.getElementById("TopTitle").innerHTML = "kelas";

        function noInputForm() {
            document.getElementById("formInput").innerHTML =
                '<h3 class="card-title">kelas</h3><button type="button" onclick="inputForm()" class="btn btn-success float-right"><i class="fas fa-plus"></i> Tambah Data</button>';
        }
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
@endsection
