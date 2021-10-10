@extends('layout')

@section('konten')
@if ($user == null)
<div class="alert alert-danger" role="alert">
    <h1 class="alert-heading">Terjadi Kesalahan</h1>
    <p>Anda belum melengkapi data profil.</p>
    <hr class="my-4">
</div>
@else
    @if ($kuisioner_status != null)
        @if ($jawaban_status == null)
        <h1>Kuesioner</h1>
        <div class="accordian" id="accordionExample">
            <form action="{{ route('jawaban_user.store') }}" method="post">
            @csrf
            @foreach ($all_2 as $item)
            <div class="card">
                <div class="card-header" id="heading{{$item['id']}}">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{{$item['id']}}" aria-expanded="true" aria-controls="collapse{{$item['id']}}">
                    {{ $item->kode_pertanyaan }} - {{ $item->deskripsi_pertanyaan }}
                    </button>
                </h2>
                </div>

                <div id="collapse{{$item['id']}}" class="collapse show" aria-labelledby="heading{{$item['id']}}" data-parent="#accordionExample">
                <div class="card-body">
                    @if ($item['is_sub_pertanyaan'] == true)

                    @foreach ($item['sub_pertanyaan'] as $sub_pertanyaan)
                        <h4 class="card-title">{{ $sub_pertanyaan['deskripsi_sub_pertanyaan'] }}</h4>

                        @foreach ($item['jawaban'] as $jawaban)

                        @if ($jawaban['sub_pertanyaan_id'] == $sub_pertanyaan['id'])
                            @if ($item['tipe'] === 'Radio')
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pertanyaan_sub_{{$sub_pertanyaan['kode_sub_pertanyaan']}}_{{$item['id']}}_{{$jawaban['nilai']}}" id="pertanyaan_sub_{{$sub_pertanyaan['kode_sub_pertanyaan']}}_{{$item['id']}}_{{$jawaban['jawaban_id']}}_{{$jawaban['nilai']}}">
                                <label class="form-check-label" for="pertanyaan_sub_{{$sub_pertanyaan['kode_sub_pertanyaan']}}_{{$item['id']}}_{{$jawaban['jawaban_id']}}_{{$jawaban['nilai']}}">
                                {{ $jawaban['deskripsi_jawaban'] }}
                                </label>
                            </div>
                            @endif
                        @endif

                        @endforeach
                        <hr class="sidebar-divider">
                    @endforeach

                    @else
                    @foreach ($item['jawaban'] as $jawaban)
                        @if ($item['tipe'] == 'Radio')
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="radiopertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}" id="pertanyaan_id_{{$item['id']}}_{{$jawaban['jawaban_id']}}_{{$jawaban['nilai']}}" value="{{$jawaban['nilai']}}">
                            <label class="form-check-label" for="pertanyaan_id_{{$item['id']}}_{{$jawaban['jawaban_id']}}_{{$jawaban['nilai']}}">
                            {{ $jawaban['deskripsi_jawaban'] }}
                            </label>
                            @if (preg_match('/Lainnya/i',$jawaban['deskripsi_jawaban']))
                            <input class="form-control form-control-sm" type="text" name="pertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}_{{$jawaban['jawaban_id']}}_{{$jawaban['nilai']}}_lainnya" id="pertanyaan_id_{{$item['id']}}_{{$jawaban['jawaban_id']}}_{{$jawaban['nilai']}}_lainnya">
                            @endif
                        </div>
                        @elseif ($item['tipe'] == 'Checkbox')
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="checkboxpertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}_{{$item['id']}}[{{$jawaban['jawaban_id']}}]" id="pertanyaan_id_{{$jawaban['jawaban_id']}}_{{$item['id']}}" value="{{$jawaban['nilai']}}">
                            <label class="form-check-label" for="pertanyaan_id_{{$jawaban['jawaban_id']}}_{{$item['id']}}">
                            {{ $jawaban['deskripsi_jawaban'] }}
                            </label>
                            @if (preg_match('/Lainnya/i',$jawaban['deskripsi_jawaban']))
                            <input class="form-control form-control-sm" type="text" name="pertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}_{{$jawaban['jawaban_id']}}_{{$item['id']}}_lainnya_{{$jawaban['kode_jawaban']}}" id="pertanyaan_id_{{$item['id']}}_{{$item['id']}}_lainnya">
                            @endif
                        </div>
                        @elseif ($item['tipe'] == 'Radio_input')
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}_{{$jawaban['pertanyaan_id']}}" id="pertanyaan_id_{{$item['id']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['nilai']}}">
                            <label class="form-check-label" for="pertanyaan_id_{{$item['id']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['nilai']}}">
                            {{ $jawaban['deskripsi_jawaban'] }}
                            @if (preg_match('/(...)(kira-kira)/i', $jawaban['deskripsi_jawaban']))
                                <input type="number" class="form-control form-control-sm" name="inputpertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['nilai']}}">
                            @endif
                            </label>
                        </div>
                        @elseif ($item['tipe'] == 'Range')
                        <label for="range_pertanyaan_id_{{$item['id']}}" class="form-label">
                            <h6>{{ $jawaban['deskripsi_jawaban'] }}</h6>
                            <div id="range_pertanyaan_id_{{$item['id']}}_{{$jawaban['jawaban_id']}}_label" class="badge badge-warning">Sedang</div>
                        </label>
                        <div class="col-sm-6">
                            <input
                            {{-- oninput="this.nextElementSibling.value = this.value" --}}
                            {{-- oninput="nilai(this.value, {{ $item['id'] }}, {{ $item['kode_pertanyaan'] }})"  --}}
                            oninput="nilai(this.value, {{ $item['id']}}, {{ $jawaban['jawaban_id'] }})"
                            type="range"
                            class="form-control-range"
                            min="1"
                            max="5"
                            id="range_pertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}"
                            name="rangepertanyaan_id_{{$item['id']}}_{{$jawaban['jawaban_id']}}_{{$jawaban['kode']}}">
                            {{-- <output class="badge badge-danger">Sedang</output> --}}
                        </div>
                        <hr class="sidebar-divider">
                        @elseif ($item['tipe'] == 'Input')
                        <label class="form-label" for="pertanyaan_id_{{$item['id']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['nilai']}}">
                            {{ $jawaban['deskripsi_jawaban'] }}
                        </label>
                        <input class="form-control form-control-sm" type="number" name="inputpertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['nilai']}}" id="pertanyaan_id_{{$item['id']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['nilai']}}">
                        @else
                        <label class="form-label" for="pertanyaan_id_{{$item['id']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['nilai']}}">
                            {{ $jawaban['deskripsi_jawaban'] }}
                        </label>
                        <input class="form-control form-control-sm" type="number" name="inputpertanyaan_id_{{$item['id']}}_{{$item['kode_pertanyaan']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['jawaban_id']}}" id="pertanyaan_id_{{$item['id']}}_{{$jawaban['pertanyaan_id']}}_{{$jawaban['nilai']}}">
                        @endif
                        {{-- <p class="card-text">{{ $jawaban['deskripsi_jawaban'] }}</p> --}}
                    @endforeach

                    @endif
                </div>
                </div>
            </div>
            <hr class="sidebar-divider">
            @endforeach
            <button class="btn btn-primary btn-sm" type="submit">
                Simpan
            </button>
            </form>
        </div>
        @else
        <div class="alert alert-success" role="alert">
            <h1 class="alert-heading">Terima Kasih</h1>
            <p>Hai {{ $user->nama_mahasiswa }}. Anda telah menyelesaikan kuesioner.</p>
            <hr class="my-4">
            <a target="_blank" class="btn btn-success" href=" {{ route('kuesioner.print', ['nim' => $user->nim]) }}">Bukti Selesai</a>
        </div>
        @endif
    @else
    <div class="alert alert-success" role="alert">
        <h1 class="alert-heading">Selamat Datang</h1>
        <p>Saat ini belum ada kuesioner. Silahkan datang di lain waktu. Terima kasih!</p>
        <hr class="my-4">
        {{-- <a target="_blank" class="btn btn-success" href=" {{ route('kuesioner.print', ['nim' => $user->nim]) }}">Bukti Selesai</a> --}}
    </div>
    @endif
@endif
@endsection

@section('js')
    <script>
      function nilai(value, id, jawaban_id, kode) {
        var s = "";
        // console.log(value);
        if(value == "1")
        {
          s = "Sangat Rendah";
        }
        else if(value == "2")
        {
          s = "Rendah";
        }
        else if(value == "3")
        {
          s = "Sedang";
        }
        else if(value == "4")
        {
          s = "Tinggi";
        }
        else {
          s = "Sangat Tinggi";
        }

        var data = $(`#range_pertanyaan_id_${id}_${jawaban_id}_label`).text(s);
        // console.log(data);
      }
    </script>
@endsection
