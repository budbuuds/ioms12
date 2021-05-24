@extends ('backend/layouts.app')
@section ('title', 'Dashboard')

@section ('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Info</h1>
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
                        <button onclick="modal_tambah('{{route("news.store")}}', 'tambah')" class="btn btn-lg btn-secondary my-4">
                            <i class="fa fa-plus"> Tambah info</i>
                        </button>
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="width:5%">No</th>
                                    <th>Informasi</th>
                                    <th>Status</th>
                                    <th style="width:10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
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

    <div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body">
                @php
                    $news = DB::table('news')->first();
                @endphp
                    <form action="" method="POST" enctype="multipart/form-data" id="formarticel">
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
                    'articel_id': aksi,
                }).then(function(res) {
                    var artikel = res.data;
                    console.log(artikel)
                    $('#articel_id').val(artikel.articel_id);
                    $('#articel_judul').val(artikel.articel_judul);
                    $('#articel_tanggal').val(artikel.articel_tanggal);
                    $('#articel_penulis').val(artikel.articel_penulis);
                    $('#articel_isi').val(artikel.articel_isi);
                    $('#articel_gambar').attr('required', false);
                    // $('#kategori_id').val(artikel.kategori_id).change();
                }).catch(function(err) {
                    // console.log(err)
                })
            }else{
                $('#articel_judul').val('');
                $('#articel_tanggal').val('');
                $('#articel_penulis').val('');
                $('#articel_isi').val('');
                $('#articel_gambar').val('');
                $('#articel_gambar').attr('required', true);
            }
            $('#formarticel').attr('action', url);
            $('#ModalTambah').modal('show');
        }

        // untuk hapus data
        function modal_hapus(url) {
            $('#ModalHapus').modal()
            $('#formDelete').attr('action', url);
        }
    </script>
@endsection