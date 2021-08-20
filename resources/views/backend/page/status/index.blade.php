@extends ('backend/layouts.app')
@section ('title', 'Status/Seleksi')

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
                                @foreach($participants as $no => $participant)
                                    <tr>
                                        <td>{{$no+1}}</td>
                                        <td>{{$participant->name}}</td>
                                        <td>{{$participant->nim}}</td>
                                        <td>{{$participant->faculties_name}}</td>
                                        <td>{{$participant->major_name}}</td>
                                        <td>{{$participant->division_name}}</td>
                                        <td>{{$participant->sub_name}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <a id="{{$participant->participant_id}}" class="zone dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    @if($participant->zone == 'g')
                                                        Hijau
                                                    @elseif($participant->zone == 'y') 
                                                        Kuning 
                                                    @else 
                                                        Merah 
                                                    @endif
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a  data-init="g" data-id="{{$participant->participant_id}}" class="dropdown-item" onclick="changeZone(this)" href="#">Hijau</a>
                                                    <a data-init="y" data-id="{{$participant->participant_id}}" class="dropdown-item" onclick="changeZone(this)" href="#">Kuning</a>
                                                    <a data-init="r" data-id="{{$participant->participant_id}}" class="dropdown-item" onclick="changeZone(this)" href="#">Merah</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input 
                                                    type="checkbox" 
                                                    class="cek_status" 
                                                    id="cek_status"
                                                    onchange="statusChecked( '{{$participant->participant_id}}', this, 
                                                    '{{ $participant->name }}')"
                                                    {{ $participant->status != "0"? "checked" : '' }}
                                                >
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="text-center"><a class="detail" href=""><i class="fas fa-eye"></a></i></td>
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
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="modalKonfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="" method="POST" id="formKonfirmasi">
                        <input type="hidden" name="participant_id" id="konf">    
                        <div class="modal-body">
                            @csrf
                            Anda yakin ingin mengganti status dari <span id="namaKonf">User</span> ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Tidak</button>
                            <button type="submit" class="btn btn-danger">Ya</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            $("#data_table").DataTable({
            "responsive": true, 
            "lengthChange": false, 
            "autoWidth": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script>
       async function changeZone(e) {
            let warna = e.innerText;
            let zone = e.dataset.init
            let id = e.dataset.id
            document.getElementById(id).innerText = warna

            console.log(warna);
            let res = await axios.post("zone", {
                zone,id
            })
        }
    </script>
    
    <script>
        function statusChecked(id, status, name) {
            console.log(name);
            let username = document.getElementById('namaKonf');
            username.innerHTML = name;
            if (status.checked) {
                let url = "{{ url('status/checked') }}";
                $('#konf').val(id);
                $('#modalKonfirmasi').modal('show');
                $('#formKonfirmasi').attr("action", url);
            } else {
                let url2 = "{{ url('status/unchecked') }}"
                $('#konf').val(id);
                $('#modalKonfirmasi').modal('show');
                $('#formKonfirmasi').attr("action", url2);
            }
        }
    </script>

@endsection