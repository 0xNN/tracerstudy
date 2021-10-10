@extends('layout')

@section('konten')

<div class="modal fade" id="addPmmbModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Master</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-tambah-edit" name="form-tambah-edit">
                              <div class="form-group">
                                <input type="hidden" name="id" id="id">

                                  <label for="nama">  NIM </label>
                                  <input type="text" name="nim_mahasiswa" id="nim_mahasiswa" class="form-control">
                              </div>
                              <div class="form-group">
                                  <label for="universitas">Nama</label>
                                  <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" class="form-control">
                              </div>
                              {{-- <div class="form-group">
                                <label for="universitas">Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            </div> --}}
                            <div class="form-group ">
                                <label for="jenis_kelamin">Jenis Kelamin</label><br>
                                {{-- <select id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                  <option name="jenis_kelamin" id="jenis_kelamin" value="laki-laki"> Laki - Laki </option>
                                  <option name="jenis_kelamin" id="jenis_kelamin" value="perempuan"> Perempuan </option>
                                </select> --}}
                                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="laki-laki">
                                    <label for="laki-laki">laki-laki</label><br>
                                <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="perempuan">
                                    <label for="perempuan">perempuan</label><br>
                              </div>
                              <div class="form-group">
                                <label for="universitas">Fakultas</label>
                                <input type="text" name="fakultas" id="fakultas" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="universitas">Program Study</label>
                                <input type="text" name="prodi" id="prodi" class="form-control">
                              </div>
                               <div class="form-group">
                                  <label for="jurusan">Tahun Lulus</label>
                                  <input type="text" name="tahun_lulus" id="tahun_lulus" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="jurusan">No. Handphone</label>
                                <input type="text" name="no_hp" id="no_hp" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="jurusan">Email</label>
                              <input type="text" name="email" id="email" class="form-control">
                          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id="tombol-simpan" value="create">Simpan</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Master</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Yakin Akan di Hapus?
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" name="tombol-hapus" id="tombol-hapus" class="btn btn-danger">Hapus</button>
        </div>
         </form>
      </div>
    </div>
  </div>

<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-th-list"></i>Master</h1>
</div>
<div class="d-sm-flex align-items-center justify-content-start mb-4">
       <button class="btn buttonExportExcel d-sm-inline-block btn-sm btn-primary shadow-sm ml-2">
        <i class="fas fa-download fa-sm text-white-50"></i>
        Export Data</button>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a href="javascript:void(0)" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="tombol-tambah">
            <i class="fas fa-plus-square" ></i>
            Add Data</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="masters" width="100%" cellspacing="0">
            <thead>
            <tr>
                 <th>NIM</th>
                 <th>PERTANYAAN</th>
                 <th>JAWABAN</th>
                 <th>SUB JAWABAN</th>
                 <th>Opsi</th>
            </tr>
            </thead>

        </table>
        </div>
    </div>
  </div>

  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    {{-- <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
        integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js"
        integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function () {
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
          });


      $(document).ready( function () {
     var tables = $('#masters').DataTable({
        processing: true,
        serverSide: true,

        ajax :{
          url:"{{ route('Master.index') }}",
          type:'GET',
        },
        columns: [
          {data:'nim_mahasiswa', name:'nim_mahasiswa'},
          {data:'id_pertanyaan', name:'id_pertanyaan'},
          {data:'id_or_jawaban', name:'id_or_jawaban'},
          {data:'sub_jawaban_us', name:'sub_jawaban_us'},
          {
                          data: 'action',
                          name: 'action'
                      },
        ],
        buttons: [
          {
            extend :'excel'
          }
            // 'copy', 'csv', 'excel', 'pdf', 'print',
        ]
        });
        $('.buttonExportExcel').click(function(e){
            tables.button('.buttons-excel').trigger();
        });
        $('#tombol-tambah').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Pegawai Baru"); //valuenya tambah pegawai baru
            $('#addPmmbModal').modal('show'); //modal tampil
        });

      if ($("#form-tambah-edit").length > 0) {
            $("#form-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');
                    $.ajax({
                        data: $('#form-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('Master.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#addPmmbModal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#masters').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('success')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan').html('Simpan');
                        }
                    });
                }
            })
        }

        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('Master/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#addPmmbModal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id').val(data.id);
                $('#nim_mahasiswa').val(data.nim_mahasiswa);
                $('#nama_mahasiswa').val(data.nama_mahasiswa);
                $('#jenis_kelamin').val(data.jenis_kelamin);
                $('#fakultas').val(data.fakultas);
                $('#prodi').val(data.prodi);
                $('#tahun_lulus').val(data.tahun_lulus);
                $('#email').val(data.email);
                $('#no_hp').val(data.no_hp);
            })
        });

        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#deleteModal').modal('show');
        });

        $('#tombol-hapus').click(function () {
            $.ajax({
                url: "Master/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#deleteModal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#masters').dataTable();
                        oTable.fnDraw(false); //reset datatable
                    });
                    iziToast.warning({ //tampilkan izitoast warning
                        title: 'Data Berhasil Dihapus',
                        message: '{{ Session('
                        delete ')}}',
                        position: 'bottomRight'
                    });
                }
            })
        });
  });
  </script>
@endsection
