@extends ('backend/layouts.app')
@section ('title', 'Dashboard')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Status/Seleksi</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">
                <div class="card">
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            <strong>{{ session()->get('message') }}</strong>
                            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <table id="data_table" class="table table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th style="width:5%" class="tect-center">No</th>
                                    <th>Nama</th>
                                    <th>No BP</th>
                                    <th>Fakultas</th>
                                    <th>Jurusan</th>
                                    <th>Divisi</th>
                                    <th>Sub Divisi</th>
                                    <th>Zona</th>
                                    <th>Status</th>
                                    <th style="width:5%">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Topan</td>
                                    <td>1710953046</td>
                                    <td>Teknik</td>
                                    <td>Teknik Elektro</td>
                                    <td>Programming</td>
                                    <td>Weba Programming</td>
                                    <td>Hijau <i class="fas fa-pencil-alt"></i></td>
                                    <td><label class="switch">
                                                <input 
                                                    type="checkbox" 
                                                    class="cek_status" 
                                                    id="cek_status" 
                                                    value="" 
                                                    onchange="" checked>
                                                <span class="slider round"></span>
                                            </label></td>
                                    <td class="text-center"><a href=""><i class="fas fa-eye"></a></i></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Topan</td>
                                    <td>1710953046</td>
                                    <td>Teknik</td>
                                    <td>Teknik Elektro</td>
                                    <td>Programming</td>
                                    <td>Web Programming</td>
                                    <td>Hijau <i class="fas fa-pencil-alt"></i></td>
                                    <td><label class="switch">
                                                <input 
                                                    type="checkbox" 
                                                    class="cek_status" 
                                                    id="cek_status" 
                                                    value="" 
                                                    onchange="" >
                                                <span class="slider round"></span>
                                            </label></td>
                                    <td class="text-center"><a href=""><i class="fas fa-eye"></a></i></td>
                                </tr>
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
    <!-- /.content -->

    <script>
        $(function () {
            $("#data_table").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection