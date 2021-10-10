@extends('layout')

@section('konten')
    @if (Session::has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if ($alumniIsExists)
        @if ($f1 != null)
            <div class="alert alert-success" role="alert">
                <h1 class="alert-heading">Terima Kasih</h1>
                <p>Anda telah melengkapi data identitas.</p>
                <hr class="my-4">
            </div>
        @else
            <form action="{{ route('F1.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card">
                <div class="card-header">
                    Profil Alumni
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-3">
                        <div class="card">
                        <div class="card-header bg-light">
                            #
                        </div>
                        <div class="card-body">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="true">Data Identitas</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Data Orang Tua</a>
                            <a class="nav-link" id="v-piills-upload-tab" data-toggle="pill" href="#v-pills-upload" role="tab" aria-controls="v-pills-upload" ariad-selected="false">Upload Foto</a>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                            <div class="card">
                            <div class="card-header">
                                Identitas
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-sm-4">
                                    <input type="hidden" id="f1_id" name="f1_id">
                                    <input type="hidden" id="f1_thnlulus" name="f1_thnlulus">
                                    <label for="form-label" for="f1_nim">
                                    NIM
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_nim" id="f1_nim" value="{{ $alumni['nim'] }}" readonly>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="f1_nama">
                                    Nama Mahasiswa
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_nama" id="f1_nama" value="{{ $alumni['nama_mahasiswa'] }}" readonly>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="f1_nomorhp">
                                    Nomor HP
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_nomorhp" id="f1_nomorhp" value="{{ $alumni['handphone'] }}" readonly>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_angkatan" class="form-label">
                                    Angkatan
                                    </label>
                                    <input id="f1_angkatan" type="text" name="f1_angkatan" class="form-control form-control-sm" value="{{ $alumni['angkatan'] }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_tahunakademik" class="form-label">
                                    Tahun Akademik
                                    </label>
                                    <input id="f1_tahunakademik" type="text" name="f1_tahunakademik" class="form-control form-control-sm" value="">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_kodept">
                                    Kode PT
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_kodept" id="f1_kodept" value="{{ trim($profilpt[0]['kode_perguruan_tinggi']) }}" readonly required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_asalperguruantinggi" class="form-label">
                                    Asal Perguruan Tinggi
                                    </label>
                                    <input value="{{ trim($profilpt[0]['nama_perguruan_tinggi']) }}" type="text" name="f1_asal_perguruan_tinggi" class="form-control form-control-sm" id="f1_asal_perguruan_tinggi" readonly>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_kurikulum" class="form-label">
                                    Kurikulum
                                    </label>
                                    <input id="f1_kurikulum" name="f1_kurikulum" class="form-control form-control-sm" type="text" value="{{ $alumni['kurikulum_relasi']['nama_kurikulum'] }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_kodeprodi">
                                    Prodi
                                    </label>
                                    <select class="form-control form-control-sm" name="f1_kodeprodi" id="f1_kodeprodi">
                                    @foreach ($prodi as $item)
                                        <option value="{{ trim($item['kode_program_studi']) }}">{{ trim($item['kode_program_studi']) }} - {{ $item['nama_program_studi'] }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_pembimbing" class="form-label">
                                    Pembimbing Akademik
                                    </label>
                                    <select id="f1_pembimbing" name="f1_pembimbing" class="form-control form-control-sm">
                                    @foreach ($dosens as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_dosen }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_pendidikanterakhir">
                                    Pendidikan Terakhir
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_pendidikanterakhir" id="f1_pendidikanterakhir" value="{{ $alumni['pendidikan_terakhir_mahasiswa_relasi']['nama_jenjang_didik'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_tanggalditerima" class="form-label">
                                    Tanggal Diterima
                                    </label>
                                    <input id="f1_tanggalditerima" name="f1_tanggalditerima" type="text" class="form-control" value="{{ $alumni['tgl_terima'] }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_tanggalselesai" class="form-label">
                                    Tanggal Selesai
                                    </label>
                                    <input id="f1_tanggalselesai" name="f1_tanggalselesai" type="text" class="form-control" value="{{ $alumni['tgl_selesai'] }}" readonly>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-4">
                                    <label class="form-label" for="f1_nik">
                                    NIK
                                    </label>
                                    {{-- <input type="hidden" name="f1_id"> --}}
                                    <input class="form-control form-control-sm" type="text" name="f1_nik" id="f1_nik" value="{{ $alumni['nik'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="f1_nisn" class="form-label">
                                    NISN
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_nisn" id="f1_nisn" value="{{ $alumni['nisn'] }}">
                                </div>
                                <div class="col-sm-4">
                                    <label for="f1_npwp" class="form-label">
                                    NPWP
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_npwp" id="f1_npwp" value="{{ $alumni['npwp'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_tempatlahir">
                                    Tempat Lahir
                                    </label>
                                    {{-- <input type="hidden" name="f1_id"> --}}
                                    <input class="form-control" type="text" name="f1_tempatlahir" id="f1_tempatlahir" value="{{ $alumni['tmp_lahir'] }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_tanggallahir" class="form-label">
                                    Tanggal Lahir
                                    </label>
                                    <input type="text" class="form-control" name="f1_tanggallahir" id="f1_tanggallahir" value="{{ $alumni['tgl_lahir'] }}" readonly>
                                </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <label class="form-label" for="f1_provinsi">
                                        Provinsi
                                    </label>
                                    {{-- <input type="hidden" name="f1_id"> --}}
                                    <select class="form-control" type="text" name="f1_provinsi" id="f1_provinsi" onclick="alert(this.value)" required></select>
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="f1_kabupaten" class="form-label">
                                        Kabupaten
                                    </label>
                                    <select type="text" class="form-control" name="f1_kabupaten" id="f1_kabupaten" required></select>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_tanggalwisuda">
                                    Tanggal Wisuda
                                    </label>
                                    <input class="form-control" type="text" name="f1_tanggalwisuda" id="f1_tanggalwisuda" value="{{ $alumni['tgl_wisuda'] }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_tanggalkompre">
                                    Tanggal Kompre
                                    </label>
                                    <input class="form-control" type="text" name="f1_tanggalkompre" id="f1_tanggalkompre" value="{{ $alumni['tgl_kompre'] }}" readonly>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_nomorijazah">
                                    No Ijazah
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_nomorijazah" id="f1_nomorijazah" value="{{ $alumni['no_ijazah'] }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_ipk">
                                    IPK
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_ipk" id="f1_ipk" value="{{ $alumni['ipk'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_namatempatbekerja">
                                    Nama Tempat Bekerja
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_namatempatbekerja" id="f1_namatempatbekerja" value="{{ ($alumni['pekerjaan_alumni_relasi'] === null) ? '' : $alumni['pekerjaan_alumni_relasi']['nama_tempat_bekerja'] }}">
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_nomorteleponperusahaan">
                                    No. Telepon Tempat Bekerja
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_nomorteleponperusahaan" id="f1_nomorteleponperusahaan">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <label class="form-label" for="f1_alamattempatbekerja">
                                    Alamat Tempat Bekerja
                                    </label>
                                    <textarea class="form-control form-control-sm" name="f1_alamattempatbekerja" rows="3" id="f1_alamattempatbekerja"></textarea>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_tanggalmasukkerja">
                                    Tanggal Masuk Kerja
                                    </label>
                                    <input class="form-control" type="text" name="f1_tanggalmasukkerja" id="f1_tanggalmasukkerja" value="{{ ($alumni['pekerjaan_alumni_relasi'] === null) ? '' : $alumni['pekerjaan_alumni_relasi']['tgl_masuk_kerja'] }}" readonly>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_jabatan">
                                    Jabatan
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_jabatan" id="f1_jabatan" value="{{ ($alumni['pekerjaan_alumni_relasi'] === null) ? '' : $alumni['pekerjaan_alumni_relasi']['jabatan'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-3">
                                    <label class="form-label" for="f1_jk">
                                    Jenis Kelamin
                                    </label>
                                    <select class="form-control form-control-sm" name="f1_jk" id="f1_jk" readonly>
                                    @if ($alumni['jenis_kelamin_id'] === 1)
                                        <option value="Laki-Laki">Laki-Laki</option>
                                    @else
                                        <option value="Perempuan">Perempuan</option>
                                    @endif
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <label class="form-label" for="f1_email">
                                    Alamat Email
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_email" id="f1_email" value="{{ ($alumni['email'] == null) ? '': $alumni['email'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_agama" class="form-label">
                                    Agama
                                    </label>
                                    <select name="f1_agama" id="f1_agama" class="form-control form-control-sm">
                                    @foreach ($agamas as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_agama }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label" for="f1_kewarganegaraan">
                                    Warga Negara
                                    </label>
                                    <input class="form-control form-control-sm" type="text" name="f1_kewarganegaraan" id="f1_kewarganegaraan" value={{ ($alumni['kewarganegaraan_relasi'] == null) ? '': $alumni['kewarganegaraan_relasi']['nama_kewarganegaraan'] }} readonly>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-2">
                                    <label for="f1_golongandarah" class="form-label">
                                    Goldar
                                    </label>
                                    <select name="f1_golongandarah" id="f1_golongandarah" class="form-control form-control-sm">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label for="f1_nomortelepon">
                                    No Telepon
                                    </label>
                                    <input type="text" name="f1_nomortelepon" class="form-control form-control-sm" id="f1_nomortelepon" value="{{ $alumni['telp'] }}" readonly>
                                </div>
                                <div class="col-sm-5">
                                    <label for="f1_nomorhp">
                                    No HP
                                    </label>
                                    <input type="text" name="f1_nomorhp" class="form-control form-control-sm" id="f1_nomorhp" value={{ $alumni['handphone'] }} readonly>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <label for="f1_alamat" class="form-label">
                                    Alamat Lengkap
                                    </label>
                                    <textarea class="form-control" name="f1_alamat" rows="3" id="f1_alamat">{{ $alumni['alamat'] }}</textarea>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                            <div class="card">
                            <div class="card-header">
                                Data Ayah
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_nikayah" class="form-label">
                                    NIK Ayah
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_nikayah" id="f1_nikayah" value="{{ $alumni['nik_ayah'] }}" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_namaayah" class="form-label">
                                    Nama Ayah
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_namaayah" id="f1_namaayah" value="{{ $alumni['nm_ayah'] }}" required>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_pendidikanayah" class="form-label">
                                    Pendidikan Ayah
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_pendidikanayah" id="f1_pendidikanayah" value="{{ ($alumni['pdidik_ayah_relasi'] == null) ? '': $alumni['pdidik_ayah_relasi']['nama_jenjang_didik']}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_tanggallahirayah" class="form-label">
                                    Tanggal Lahir Ayah
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_tanggallahirayah" id="f1_tanggallahirayah" value="{{ $alumni['tgl_lahir_ayah'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_pekerjaanayah" class="form-label">
                                    Pekerjaan Ayah
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_pekerjaanayah" id="f1_pekerjaanayah" value="{{ ($alumni['pek_ayah_relasi'] == null) ? '': $alumni['pek_ayah_relasi']['nama_pekerjaan'] }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_penghasilanayah" class="form-label">
                                    Penghasilan Ayah
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_penghasilanayah" id="f1_penghasilanayah" value="{{ ($alumni['penghasilan_ayah_relasi']==null) ? '':$alumni['penghasilan_ayah_relasi']['nama_penghasilan'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <label for="f1_alamatayah" class="form-label">
                                    Alamat Ayah
                                    </label>
                                    <textarea class="form-control" name="f1_alamatayah" id="f1_alamatayah" rows="4">{{ $alumni['almt_ayah'] }}</textarea>
                                </div>
                                </div>
                            </div>
                            </div>
                            <hr class="sidebar-divider">
                            <div class="card">
                            <div class="card-header">
                                Data Ibu
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_nikibu" class="form-label">
                                    NIK Ibu
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_nikibu" id="f1_nikibu" value="{{ $alumni['nik_ibu'] }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_namaibu" class="form-label">
                                    Nama Ibu
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_namaibu" id="f1_namaibu" value="{{ $alumni['nm_ibu'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_pendidikanibu" class="form-label">
                                    Pendidikan Ibu
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_pendidikanibu" id="f1_pendidikanibu" value="{{ ($alumni['pdidik_ibu_relasi'] == null) ? '' : $alumni['pdidik_ibu_relasi']['nama_jenjang_didik'] }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_tanggallahiribu" class="form-label">
                                    Tanggal Lahir Ibu
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_tanggallahiribu" id="f1_tanggallahiribu" value="{{ $alumni['tgl_lahir_ibu'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-6">
                                    <label for="f1_pekerjaanibu" class="form-label">
                                    Pekerjaan Ibu
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_pekerjaanibu" id="f1_pekerjaanibu" value="{{ ($alumni['pek_ibu_relasi'] == null) ?'':$alumni['pek_ibu_relasi']['nama_pekerjaan'] }}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="f1_penghasilanibu" class="form-label">
                                    Penghasilan Ibu
                                    </label>
                                    <input type="text" class="form-control form-control-sm" name="f1_penghasilanibu" id="f1_penghasilanibu" value="{{ ($alumni['penghasilan_ibu_relasi'] == null) ? "": $alumni['penghasilan_ibu_relasi']['nama_penghasilan'] }}">
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-sm-12">
                                    <label for="f1_alamatibu" class="form-label">
                                    Alamat Ibu
                                    </label>
                                    <textarea class="form-control" name="f1_alamatibu" id="f1_alamatibu" rows="4">{{ $alumni['almt_ibu'] }}</textarea>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-upload" role="tabpanel" aria-labelledby="v-pills-upload-tab">
                            <div class="card">
                            <div class="card-header">
                                Upload Foto
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-sm-12">
                                    <div class="custom-file">
                                    <label class="custom-file-label" for="f1_foto">
                                        Upload Foto <span class="badge badge-success"> max: 150 Kb</span>
                                    </label>
                                    <input type="file" name="f1_foto" id="f1_foto" class="custom-file-input">
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>

                </div>
                <div class="card-footer">
                    @if ($f1 !== null)
                    <button class="btn btn-success btn-sm" type="submit" {{ ($f1->isset_from_alumni === 1) ? 'disabled' : '' }}>Simpan</button>
                    @else
                    <button class="btn btn-success btn-sm" type="submit">Simpan</button>
                    @endif
                </div>
                </div>
            </form>
        @endif
    @else
    <div class="alert alert-success" role="alert">
        <h1 class="alert-heading">Terjadi Kesalahan</h1>
        <p>Maaf data alumni {{ auth()->user()->name }} tidak ada di Sisfo.</p>
        <hr class="my-4">
    </div>
    @endif
    <hr class="divider-siderbar">
@endsection

@section('css')
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  <script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
  </script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <script>
    (function ( $ ) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      $('#f1_tanggalditerima').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
      });

      $('#f1_tanggalselesai').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
      });

      $('#f1_tanggalwisuda').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
      });

      $('#f1_tanggalkompre').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
      });

      $('#f1_tanggalmasukkerja').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
      });

      $('#f1_tanggallahir').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
      });

    $('#f1_provinsi').select2({
        placeholder: 'Cari Provinsi...',
        ajax: {
        url: "https://sisfo.host1.fran.id/indonesia-guest/provinsi",
        dataType: 'json',
        delay: 250,
        processResults: function (data) {
            return {
                results: data.results
            };
        },
        cache: true
        }
    });

    $('#f1_kabupaten').on('change', function() {
        var data = $("#f1_provinsi option:selected").val();
    });

    $('#f1_kabupaten').select2({
        placeholder: 'Cari Kabupaten...',
    });


    $('#f1_provinsi').on('change', function() {
        var data = $("#f1_provinsi option:selected").val();
        console.log(data);
        $('#f1_kabupaten').select2({
            placeholder: 'Cari Kabupaten...',
            ajax : {
            url: "https://sisfo.host1.fran.id/indonesia-guest/kab-kota/"+data,
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data.results
                };
            },
            cache: true
            }
        });
    })
    }( jQuery ));
  </script>
@endsection
