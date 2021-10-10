@extends('layout')

@section('konten')

<div class="modal fade" id="addUtamaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sub Pertanyaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="form-tambah-edit" name="form-tambah-edit">
                              <div class="form-group">
                                <input type="hidden" name="id" id="id">

                                  <label for="deskripsi_jawaban">Deskripsi Jawaban </label>
                                  <textarea name="deskripsi_jawaban" id="deskripsi_jawaban" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="pertanyaan_id">Pertanyaan</label>
                                <select class="form-control" id="pertanyaan_id" name="pertanyaan_id">
                                    <option>Choose...</option>
                                    @foreach ($pertanyaans as $pertanyaan)
                                <option value="{{$pertanyaan->id}}">{{$pertanyaan->id}} --- {{$pertanyaan->deskripsi_pertanyaan}}</option>
                                    @endforeach
                                  </select>
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

  <div class="modal fade" id="deleteUtamaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pertanyaan Utama</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Yakin Akan di Hapus?
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" name="tombol-utama-hapus" id="tombol-utama-hapus" class="btn btn-danger">Hapus</button>
        </div>
        </form>
      </div>
    </div>
  </div>


  <div class="d-sm-flex align-items-center justify-content-start mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-check-circle"></i>Data Jawaban</h1>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3 ">
        <h6 class="m-0 font-weight-bold text-primary d-sm-inline-block">Jawaban</h6>
    </div>
    <div class="card-body">
    <a href="javascript:void(0)" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="tombol-utama">
            <i class="fas fa-plus-square" ></i>
            Add Jawaban</a>
        <div class="table-responsive mt-2">
            <table class="table table-bordered" id="jawaban" width="100%" cellspacing="0">
            <thead>
            <tr>
              <th>ID</th>
              <th>KODE</th>
              <th>DESKRIPSI JAWABAN</th>
              <th>Opsi</th>
            </tr>
            </thead>

        </table>
        </div>
    </div>
  </div>


  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
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
            $('#jawaban').DataTable({
              processing: true,
              serverSide: true,
              ajax :{
                url:"{{ route('Jawaban.index') }}",
                type:'GET',
              },
              columns: [
                {data:'id', name:'id'},
                {data:'kode_jawaban', name:'kode_jawaban'},
                {data:'deskripsi_jawaban', name:'deskripsi_jawaban'},
                {
                                data: 'action',
                                name: 'action'
                            },
              ],
              buttons: [
              {
                  extend: 'excel',
              }
          ],
              order:[[0,'asc']]

              });
              $('#tombol-utama').click(function () {
                  $('#button-simpan').val("create-post"); //valuenya menjadi create-post
                  $('#id').val(''); //valuenya menjadi kosong
                  $('#form-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
                  $('#modal-judul').html("Tambah Pegawai Baru"); //valuenya tambah pegawai baru
                  $('#addUtamaModal').modal('show'); //modal tampil
              });

            if ($("#form-tambah-edit").length > 0) {
                  $("#form-tambah-edit").validate({
                      submitHandler: function (form) {
                          var actionType = $('#tombol-simpan').val();
                          $('#tombol-simpan').html('Sending..');
                          $.ajax({
                            data: $('#form-tambah-edit')
                                .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                            url: "{{ route('Jawaban.store') }}", //url simpan data
                            type: "POST", //karena simpan kita pakai method POST
                            dataType: 'json', //data tipe kita kirim berupa JSON
                            success: function (data) { //jika berhasil
                              console.log(data);
                              $('#form-tambah-edit').trigger("reset"); //form reset
                              $('#addUtamaModal').modal('hide'); //modal hide
                              $('#tombol-simpan').html('Simpan'); //tombol simpan
                              var oTable = $('#jawaban').dataTable(); //inialisasi datatable
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
                  $.get('Jawaban/' + data_id + '/edit', function (data) {
                      $('#modal-judul').html("Edit Post");
                      $('#tombol-simpan').val("edit-post");
                      $('#addUtamaModal').modal('show');
                      //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                      $('#id').val(data.id);
                      $('#deskripsi_jawaban').val(data.deskripsi_jawaban);
                      $('#pertanyaan_id').val(data.pertanyaan_id);
                  })
              });

              $(document).on('click', '.delete', function () {
                  dataId = $(this).attr('id');
                  $('#deleteUtamaModal').modal('show');
              });

              $('#tombol-utama-hapus').click(function () {
                  $.ajax({
                      url: "Jawaban/" + dataId, //eksekusi ajax ke url ini
                      type: 'delete',
                      beforeSend: function () {
                          $('#tombol-utama-hapus').text('Hapus Data'); //set text untuk tombol hapus
                      },
                      success: function (data) { //jika sukses
                          setTimeout(function () {
                              $('#deleteUtamaModal').modal('hide'); //sembunyikan konfirmasi modal
                              var oTable = $('#jawaban').dataTable();
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

{{-- @include('subjawaban') --}}
@endsection
