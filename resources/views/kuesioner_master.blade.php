@extends('layout')

@section('konten')

  <div class="modal fade" id="addUtamaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form id="form-tambah-edit" name="form-tambah-edit">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kuesioner</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" name="id" id="id">
            <label for="nama_kuesioner">Nama/Label Kuesioner</label>
            <textarea name="nama_kuesioner" id="nama_kuesioner" class="form-control"></textarea>
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

  <div class="modal fade" id="addPertanyaanModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form id="form-edit-pertanyaan" name="form-edit-pertanyaan">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Pertanyaan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group tambah-checkbox" id="tambah-checkbox">
            <input type="hidden" name="id_pertanyaan_master" id="id_pertanyaan_master">
            {{-- @foreach ($pertanyaans as $pertanyaan)              
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="pertanyaan_id" name="pertanyaan_id[]" value="{{ $pertanyaan->id }}" {{ empty($pertanyaan->kuesioner_master_pertanyaan) ? '': 'checked' }}>
                <label class="form-check-label" for="pertanyaan_id">{{ $pertanyaan->deskripsi_pertanyaan }}</label>
              </div>
            @endforeach --}}
            <div id="data-checkbox" class="data-checkbox">

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-success" id="tombol-edit-pertanyaan" value="create">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteUtamaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kuesioner</h5>
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
      </div>
    </div>
  </div>

  <div class="d-sm-flex align-items-center justify-content-start mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-question-circle"></i>Kuesioner Master</h1>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3 ">
        <h6 class="m-0 font-weight-bold text-primary d-sm-inline-block">Kuesioner</h6>
    </div>
    <div class="card-body">
      <a href="javascript:void(0)" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="tombol-utama">
        <i class="fas fa-plus-square" ></i>
        Add Kuesioner
      </a>
      <a href="{{ route('export.kuesioner') }}" class="btn btn-sm btn-success my-3" target="_blank">
        <i class="fas fa-download"></i>
        Export Excel
      </a>
      <div class="table-responsive mt-2">
        <table class="table table-bordered table-sm" id="utama" width="100%" cellspacing="0">
          <thead>
          <tr>
            <th>ID</th>
            <th>Nama/Label</th>
            <th>Status</th>
            <th>Opsi</th>
          </tr>
          </thead>
          <tbody>
          </tbody>
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
      $('#utama').DataTable({
        processing: true,
        serverSide: true,
        ajax :{
          url:"{{ route('kuesioner_master.index') }}",
          type:'GET',
        },
        columns: [
          {data: 'id', name: 'id'},
          {data: 'nama_kuesioner', name: 'nama_kuesioner'},
          {data: 'status', name: 'status'},
          {data: 'action', name: 'action'},
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
                        url: "{{ route('kuesioner_master.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil
                            console.log(data);
                            $('#form-tambah-edit').trigger("reset"); //form reset
                            $('#addUtamaModal').modal('hide'); //modal hide
                            $('#tombol-simpan').html('Simpan'); //tombol simpan
                            var oTable = $('#utama').dataTable(); //inialisasi datatable
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

        if ($("#form-edit-pertanyaan").length > 0) {
          $("#form-edit-pertanyaan").validate({
            submitHandler: function (form) {
              var actionType = $('#tombol-edit-pertanyaan').val();
              $('#tombol-edit-pertanyaan').html('Sending..');
              $.ajax({
                data: $('#form-edit-pertanyaan')
                    .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                url: "{{ route('kuesioner_master.simpan-pertanyaan') }}", //url simpan data
                type: "POST", //karena simpan kita pakai method POST
                dataType: 'json', //data tipe kita kirim berupa JSON
                success: function (data) { //jika berhasil
                  console.log(data);
                  $('#form-edit-pertanyaan').trigger("reset"); //form reset
                  $('#addPertanyaanModal').modal('hide'); //modal hide
                  $('#tombol-edit-pertanyaan').html('Simpan'); //tombol simpan
                  var oTable = $('#utama').dataTable(); //inialisasi datatable
                  oTable.fnDraw(false); //reset datatable
                  iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                    title: 'Data Berhasil Disimpan',
                    message: '{{ Session('success')}}',
                    position: 'bottomRight'
                  });
                },
                error: function (data) { //jika error tampilkan error pada console
                  console.log('Error:', data);
                  $('#tombol-edit-pertanyaan').html('Simpan');
                }
              });
            }
          })
        }

        $('body').on('click', '.edit-pertanyaan-post', function () {
            var data_id = $(this).data('id');
            $.get('kuesioner_master/' + data_id + '/edit_pertanyaan', function (data) {
                console.log(data.length);
                $('#modal-judul').html("Edit Pertanyaan Post");
                $('#tombol-edit-pertanyaan').val("edit-pertanyaan-post");
                $('#addPertanyaanModal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id_pertanyaan_master').val(data.id);
                var id = $('#id_pertanyaan_master').val();
                var html = '';
                $.each(data, function(key, value) {
                  console.log(value['deskripsi_pertanyaan']);
                  html += `
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="pertanyaan_id" name="pertanyaan_id[]" value="${value['kuesioner_master_id']}">
                    <label class="form-check-label" for="pertanyaan_id">${value['deskripsi_pertanyaan']}</label>
                  </div>
                  `;
                });
                
                console.log(html);
                $('#data-checkbox').html(html);
                // $('#nama_kuesioner').val(data.nama_kuesioner);
            })
        });

        $('body').on('click', '.edit-post', function () {
            var data_id = $(this).data('id');
            $.get('kuesioner_master/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#addUtamaModal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id').val(data.id);
                $('#nama_kuesioner').val(data.nama_kuesioner);
            })
        });

        $('body').on('click', '.detail-post', function () {
            var data_id = $(this).data('id');
            $.get('kuesioner_master/' + data_id, function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan').val("edit-post");
                $('#addUtamaModal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#id').val(data.id);
                $('#nama_kuesioner').val(data.nama_kuesioner);
            })
        });

        $(document).on('click', '.delete', function () {
            dataId = $(this).attr('id');
            $('#deleteUtamaModal').modal('show');
        });

        $('#tombol-utama-hapus').click(function () {
            var url = "{{ route('kuesioner_master.destroy', ":dataId") }}";
            url = url.replace(':dataId', dataId);
            $.ajax({
                url: url, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                  $('#tombol-utama-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#deleteUtamaModal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#utama').dataTable();
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

    $(document).ready( function () {
      $(document).on('click', '#edit-status', function() {
        var id = $(this).data('id');
        var text = $(this).text();
        var url = "{{ route('kuesioner_master.update', ":id") }}";
        url = url.replace(':id', id);
        console.log(url);
        $.ajax({
          url: url, //eksekusi ajax ke url ini
          data: {
            text: text,
            id: id,
            _token:'{{ csrf_token() }}',
          },
          dataType: "json",
          type: 'PUT',
          error: function (data) {
            console.log(data);
          },
          success: function (data) { //jika sukses
            console.log(data['kuesioner_master']);
            var oTable = $('#utama').dataTable(); //inialisasi datatable
            oTable.fnDraw(false); //reset datatable
            iziToast.warning({ //tampilkan izitoast warning
                title: 'Berhasil',
                message: data['kuesioner_master']['nama_kuesioner'] + ' diubah ke ' + data['kuesioner_master']['status'],
                position: 'bottomRight'
            });

            // setTimeout(function() {
            //   location.reload(true);
            // }, 1000);
          }
        })
      })
    })
  </script>

{{-- @include('subpertanyaan') --}}
@endsection
