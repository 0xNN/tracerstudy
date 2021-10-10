@extends('layout')

@section('konten')

<h4>Pertanyaan Kuesioner</h4>
<div class="card">
    <form id="regForm" method="POST" action="{{ route('jawaban_user.store') }}">
        {{ csrf_field() }}
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" id="myTab">
                @foreach ($datta as $items)
                <li class="nav-item">
                    <a href="#pertanyaan{{$items->id}}" class="nav-link" data-toggle="tab">{{$items->kode_pertanyaan}}</a>
                </li>
                @endforeach
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
            @foreach ($datta as $items)
                <div class="tab-pane fade" id="pertanyaan{{$items->id}}">
                    <p class="mt-2">
                        Tipe Pertanyaan <span class="badge badge-success">{{ $items->pertanyaan_tipe->tipe->nama_tipe }}</span>
                    </p>
                    <h5 class="mt-2">
                        <input type="hidden" id="id_pertanyaan" value="{{$items->id}}" name="id_pertanya[{{$items->id}}]">{{$loop->iteration.'. '.$items->deskripsi_pertanyaan}}
                        <input type="hidden" id="nim_mahasiswa" name="nim_mahasiswa" value="{{Session::get('nim')}}">
                    </h5>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        @if ($items->pertanyaan_tipe->tipe->nama_tipe === 'Input') 
                            <input type="text" name="question_input_{{$items->id}}" class="form-control">
                        @endif
                        @if ($items->pertanyaan_tipe->tipe->nama_tipe === 'Radio')
                            @foreach ($datas as $jawaban)
                                @if ($items->id === $jawaban->pertanyaan_id)
                                    @if (preg_match("/lainnya/i", $jawaban->deskripsi_jawaban))
                                        <div class="form-check">
                                            <input onclick="cek( {{$jawaban->id}}, 'radio' )" class="form-check-input" type="radio" name="question_radio_{{$items->id}}[]" id="question_radio_{{$jawaban->id}}" value="radio_{{$jawaban->id}}_from_{{$items->id}}">
                                            <label class="form-check-label" for="question_radio_{{ $jawaban->id }}">
                                            {{ $jawaban->deskripsi_jawaban }}
                                            </label>
                                        </div>
                                        <input style="display:none" class="form-control" type="text" name="question_radio_{{$items->id}}[]" id="question_radio_lainnya_{{$jawaban->id}}">
                                    @else
                                        <div class="form-check">
                                            <input onclick="cek( {{$jawaban->id}}, 'radio' )" class="form-check-input" type="radio" name="question_radio_{{$items->id}}[]" id="question_radio_{{$jawaban->id}}" value="radio_{{$jawaban->id}}_from_{{$items->id}}">
                                            <label class="form-check-label" for="question_radio_{{ $jawaban->id }}">
                                            {{ $jawaban->deskripsi_jawaban }}
                                            </label>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                        @if ($items->pertanyaan_tipe->tipe->nama_tipe === 'Checkbox')
                            @foreach ($datas as $jawaban)
                                @if ($items->id === $jawaban->pertanyaan_id)
                                    @if (preg_match("/lainnya/i",$jawaban->deskripsi_jawaban))
                                        <div class="form-check">
                                            <input onclick="cek( {{$jawaban->id}}, 'checkbox' )" class="form-check-input" type="checkbox" name="question_checkbox_{{$items->id}}[]" id="question_checkbox_{{$jawaban->id}}" value="checkbox_{{$jawaban->id}}_from_{{$items->id}}">
                                            <label class="form-check-label" for="question_checkbox_{{ $jawaban->id }}">
                                            {{ $jawaban->deskripsi_jawaban }}
                                            </label>
                                        </div>
                                        <input style="display:none" class="form-control" type="text" name="question_checkbox_{{$items->id}}[]" id="question_checkbox_lainnya_{{$jawaban->id}}">
                                    @else
                                        <div class="form-check">
                                            <input onclick="cek( {{$jawaban->id}}, 'checkbox' )" class="form-check-input" type="checkbox" name="question_checkbox_{{$items->id}}[]" id="question_checkbox_{{$jawaban->id}}" value="checkbox_{{$jawaban->id}}_from_{{$items->id}}">
                                            <label class="form-check-label" for="question_checkbox_{{ $jawaban->id }}">
                                            {{ $jawaban->deskripsi_jawaban }}
                                            </label>
                                        </div>
                                    @endif
                                @endif
                            @endforeach
                        @endif
                        @if ($items->pertanyaan_tipe->tipe->nama_tipe === 'Radi')
                            <select name="question-{{$items->id}}" class="form-control">                            
                                @foreach ($datas as $jawaban)
                                    @if ($items->id === $jawaban->pertanyaan_id)
                                        <option value="{{$jawaban->id}}">{{$jawaban->deskripsi_jawaban}}</option>
                                    @endif
                                @endforeach
                            </select>
                            {{-- <input type="text" name="question-{{$items->id}}" class="form-control"> --}}
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
        <div>
        @foreach ($datta as $items)
            <span class="step"></span>
        @endforeach
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-success" type="submit">Simpan</button>
        </div>
    </form>
</div>

@endsection

@section('js')
    <script type="text/javascript">
        function cek(jawaban, tipe)
        {
            // console.log(jawaban);
            // console.log(tipe);
            var id = `question_${tipe}_${jawaban}`;
            // console.log(id);
            var nilai = document.getElementById(id).value;
            // console.log(nilai);

            var id_lainnya = `#question_${tipe}_lainnya_${jawaban}`;
            // var id_lainnya = `#question-${tipe}-lainnya`;
            if(document.getElementById(id).checked) {
                $.get(`Kuesioner/get-data/${jawaban}`, {
                    id: id
                },(response) => {
                    var kalimat = response['deskripsi_jawaban'];
                    var kata1 = kalimat.search('Lain');
                    var kata2 = kalimat.search('tulis');
                    if( kata1 > -1 || kata2 > -1 )
                    {
                        $(id_lainnya).val('');
                        // $(id_lainnya).show();
                        $(id_lainnya).show();
                    }
                    else {
                        $(id_lainnya).val('');
                        $(id_lainnya).hide();
                    }
                });
            }

            if(document.getElementById(id).checked == false) {
                $(id_lainnya).val('');
                // $(`#question-${tipe}-lainnya-${jawaban}`).hide();
                $(id_lainnya).hide();
            }
        }
    </script>
@endsection
