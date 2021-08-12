@extends ('backend/layouts.app')
@section ('title', 'Dashboard')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Informasi</h1>
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
                        <button onclick="modal_tambah('{{route("news.store")}}', 'tambah')" class="btn btn-lg btn-warning my-4">
                            <i class="fa fa-plus"> Tambah info</i>
                        </button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th style="width:5%" class="tect-center">No</th>
                                    <th>Informasi</th>
                                    <th>Status</th>
                                    <th style="width:5%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $i => $info)
                                    <tr>
                                        <td class="tect-center">{{ $i + 1 }}</td>
                                        <td>{{ $info->news_title }}</td>
                                        <td>
                                            <label class="switch">
                                                <input 
                                                    type="checkbox" 
                                                    class="cek_status" 
                                                    id="cek_status" 
                                                    value="{{ $info->news_status }}" 
                                                    onchange="cekStatus(<?= $info->news_id ?>, this)" 
                                                    <?php echo ($info->news_status == 'on') ? "checked" : "" ?> >
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <!-- <button type="button" class="btn btn-warning btn-sm" 
                                            onclick="modal_tambah('{{ route("news.store") }}', '{{ $info->news_id  }}')"><i class="fa fa-edit .text-white" style="color: #fff !important"></i></button> -->
                                            <button type="button" class="btn btn-danger btn-sm" 
                                            onclick="modal_hapus('{{ route('news.delete', $info->news_id) }}')"><i class="fa fa-trash"></i></button>
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
    <!-- /.content -->

    <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                @php
                    $news = DB::table('news')->first();
                @endphp
                    <form action="" method="POST" enctype="multipart/form-data" id="formNews">
                        @csrf
                        <input type="hidden" name="news_id" id="news_id">
                        <div class="form-group">
                            <input type="text" class="form-control" name="news_title" id="news_title" placeholder="Subject:" value="{{ old('news_title') ?? $news->news_title ?? '' }}" required>
                        </div>
                        <div class="form-group">
                            <textarea id="news" rows="10" class="form-control" name="news" value="{{ old('news') ?? $news->news ?? '' }}"></textarea>
                        </div>
                        <div class="row">
                            <div>
                                <button type="submit" class="btn btn-warning d-flex justify-content-end" name="simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="formDelete">
                    <div class="modal-body">
                        @csrf
                        @method('delete')
                        Yakin Hapus Data ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function modal_tambah(url, aksi){ 
            if(aksi != 'tambah'){
                // ambil data dari axios
                axios.post("{{ route('cari_data_news') }}", {
                    'news_id': aksi,
                }).then(function(res) {
                    var news = res.data;
                    console.log(news)
                    $('#news_id').val(news.news_id);
                    $('#news_title').val(news.news_title);
                    $('#news').val(news.news);
                }).catch(function(err) {
                    // console.log(err)
                })
            }else{
                $('#news_title').val('');
                $('#news').val('');
            }
            $('#formNews').attr('action', url);
            $('#ModalTambah').modal('show');
        }

        function cekStatus(news_id, ceklis) {
            if (ceklis.checked) {
                // alert("ceklis Dihidupkan")
                axios.post("{{route('news.active')}}", {
                    'id': news_id,
                }).then(function(res) {
                    console.log(res.data.message)
                    toastr.info(res.data.message)
                }).catch(function(err) {
                    console.log(err);
                })
            } else {
                // alert("Ceklis dimatikan")
                axios.post("{{route('news.non_active')}}", {
                    'id': news_id,
                }).then(function(res) {
                    // console.log(res.data.message)
                    toastr.warning(res.data.message)
                }).catch(function(err) {
                    console.log(err);
                })
            }
        }

        // untuk hapus data
        function modal_hapus(url) {
            $('#ModalHapus').modal()
            $('#formDelete').attr('action', url);
        }
    </script>
@endsection