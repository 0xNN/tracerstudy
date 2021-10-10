<div class="modal fade" id="addSubModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sub Jawaban</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form  id="sub-tambah-edit" name="sub-tambah-edit">
                              <div class="form-group">
                                <input type="hidden" name="id" id="ids">

                                  <label for="nama">  Deskripsi Sub Jawaban </label>
                                  <textarea name="deskripsi__jawaban" id="deskripsi__jawaban" class="form-control"></textarea>
                              </div>
                              <div class="form-group">
                                <label for="nama"> Id Jawaban Utama</label>
                                <select class="form-control" id="id_jawaban" name="id_jawaban">
                                    <option>Choose...</option>
                                    @foreach ($nama as $item)
                                <option value="{{$item->id}}">{{$item->id}}--{{$item->deskripsi_jawaban}}</option>
                                    @endforeach
                                  </select>
                              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id="tombol-simpan-sub" value="create">Simpan</button>
        </div>
         </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deleteSubModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Sub Jawaban</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           Apakah Anda Yakin Akan di Hapus?
         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" name="tombol-sub-hapus" id="tombol-sub-hapus" class="btn btn-danger">Hapus</button>
        </div>
         </form>
      </div>
    </div>
  </div>

<div class="card shadow mb-4">
    <div class="card-header py-3 ">
        <h6 class="m-0 font-weight-bold text-primary d-sm-inline-block">Sub Jawaban</h6>
    </div>
    <div class="card-body">
     <a href="javascript:void(0)" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="tombol-sub">
            <i class="fas fa-plus-square" ></i>
            Add Sub Jawaban</a>
        <div class="table-responsive mt-2">
            <table class="table table-bordered table-sm" id="sub" width="100%" cellspacing="0">
            <thead>
            <tr>
                 <th>ID</th>
                 <th>DESKRIPSI SUB JAWABAN</th>
                 <th>ID JAWABAN UTAMA </th>
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
                $('#sub').DataTable({
                  processing: true,
                  serverSide: true,
                  ajax :{
                    url:"{{ route('SubJawaban.index') }}",
                    type:'GET',
                  },
                  columns: [
                    {data:'id', name:'id'},
                    {data:'deskripsi__jawaban', name:'deskripsi__jawaban'},
                    {data:'id_jawaban', name:'id_jawaban'},
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
            $('#tombol-sub').click(function () {
            $('#button-simpan').val("create-post"); //valuenya menjadi create-post
            $('#id').val(''); //valuenya menjadi kosong
            $('#sub-tambah-edit').trigger("reset"); //mereset semua input dll didalamnya
            $('#modal-judul').html("Tambah Pegawai Baru"); //valuenya tambah pegawai baru
            $('#addSubModal').modal('show'); //modal tampil
        });

      if ($("#sub-tambah-edit").length > 0) {
            $("#sub-tambah-edit").validate({
                submitHandler: function (form) {
                    var actionType = $('#tombol-simpan-sub').val();
                    $('#tombol-simpan-sub').html('Sending..');
                    $.ajax({
                        data: $('#sub-tambah-edit')
                            .serialize(), //function yang dipakai agar value pada form-control seperti input, textarea, select dll dapat digunakan pada URL query string ketika melakukan ajax request
                        url: "{{ route('SubJawaban.store') }}", //url simpan data
                        type: "POST", //karena simpan kita pakai method POST
                        dataType: 'json', //data tipe kita kirim berupa JSON
                        success: function (data) { //jika berhasil
                            $('#sub-tambah-edit').trigger("reset"); //form reset
                            $('#addSubModal').modal('hide'); //modal hide
                            $('#tombol-simpan-sub').html('Simpan'); //tombol simpan
                            var oTable = $('#sub').dataTable(); //inialisasi datatable
                            oTable.fnDraw(false); //reset datatable
                            iziToast.success({ //tampilkan iziToast dengan notif data berhasil disimpan pada posisi kanan bawah
                                title: 'Data Berhasil Disimpan',
                                message: '{{ Session('success')}}',
                                position: 'bottomRight'
                            });
                        },
                        error: function (data) { //jika error tampilkan error pada console
                            console.log('Error:', data);
                            $('#tombol-simpan-sub').html('Simpan');
                        }
                    });
                }
            })
        }

        $('body').on('click', '.edit-sub', function () {
            var data_id = $(this).data('id');
            $.get('SubJawaban/' + data_id + '/edit', function (data) {
                $('#modal-judul').html("Edit Post");
                $('#tombol-simpan-sub').val("edit-post");
                $('#addSubModal').modal('show');
                //set value masing-masing id berdasarkan data yg diperoleh dari ajax get request diatas
                $('#ids').val(data.id);
                $('#deskripsi__jawaban').val(data.deskripsi__jawaban);
                $('#id_jawaban').val(data.id_jawaban);
            })
        });

        $(document).on('click', '.deletesub', function () {
            dataId = $(this).attr('id');
            $('#deleteSubModal').modal('show');
        });

        $('#tombol-sub-hapus').click(function () {
            $.ajax({
                url: "SubJawaban/" + dataId, //eksekusi ajax ke url ini
                type: 'delete',
                beforeSend: function () {
                    $('#tombol-sub-hapus').text('Hapus Data'); //set text untuk tombol hapus
                },
                success: function (data) { //jika sukses
                    setTimeout(function () {
                        $('#deleteSubModal').modal('hide'); //sembunyikan konfirmasi modal
                        var oTable = $('#sub').dataTable();
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
