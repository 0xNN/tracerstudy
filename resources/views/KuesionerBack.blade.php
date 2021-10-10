@extends('layout')

@section('konten')
@php
// $no = 1;
$count=1;
// $no++;
// $a = 1;
// $b = 1;
// $c = 1;
// $d = 1;
// $e = 1;
@endphp
<form id="regForm" method="POST" action="{{ route('jawaban_user.store') }}">
{{ csrf_field() }}
<div class="form-group">
@foreach ($datta as $items)
<div class="tab">
<input type="hidden" id="id_pertanyaan" value="{{$items->id}}" name="id_pertanya[{{$count}}]">{{$count.'. '.$items->deskripsi_pertanyaan}}
<input type="hidden" id="nim_mahasiswa" name="nim_mahasiswa" value="{{Session::get('nim')}}">
{{-- @foreach ($datas as $item)
    @if ($item->id_pertanyaan == $items->id)
        @foreach ($dataa as $itemss)
            @if ($items->id == $itemss->id_pertanyaan)
            @if ($itemss->desk_tipe_soal == 'Radio')
                <div class="form-check">
                <input class="form-check-input" type="radio" name="id_or_jawaban[{{$items->id}}]" id="{{$item->id}}" value="1">
                <label class="form-check-label" for="{{$item->deskripsi_jawaban}}">
                    {{$item->deskripsi_jawaban}}
                </label>
                </div>

            @elseif($itemss->desk_tipe_soal == 'CheckBox')
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="id_or_jawaban[{{$items->id}}]"  id="id_or_jawaban{{$b++}}" value="{{$b++}}">
                    <label class="form-check-label" for="{{$item->deskripsi_jawaban}}">
                        {{$item->deskripsi_jawaban}}
                    </label>
                </div>
                    @foreach ($subj as $ite)
                        @if ($item->id == $ite->id_jawaban)
                            <input type="text" value="{{$ite->deskripsi__jawaban}}" id="sub_jawaban_us" name="sub_jawaban_us[{{$item->id}}]">
                        @endif
                    @endforeach

                @elseif($itemss->desk_tipe_soal == 'Radio_lain')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="id_or_jawaban[{{$items->id}}]"  id="id_or_jawaban{{$c++}}" value="{{$c++}}">
                        <label class="form-check-label" for="{{$item->deskripsi_jawaban}}">
                            {{$item->deskripsi_jawaban}}
                        </label>
                    </div>
                    @foreach ($subj as $ite)
                        @if ($item->id == $ite->id_jawaban)
                        <input type="text" value="{{$ite->deskripsi__jawaban}}" id="sub_jawaban_us" name="sub_jawaban_us[{{$item->id}}]">
                        @endif
                    @endforeach

                @elseif($itemss->desk_tipe_soal == 'Radio_Input')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="id_or_jawaban[{{$items->id}}]"  id="id_or_jawaban{{$d++}}" value="{{$d++}}">
                        <label class="form-check-label" for="{{$items->deskripsi_jawaban}}">
                            {{$item->deskripsi_jawaban}}
                        @foreach ($subj as $ite)
                                @if ($item->id == $ite->id_jawaban)
                                <input type="text" value="{{$ite->deskripsi__jawaban}}" id="sub_jawaban_us" name="sub_jawaban_us[{{$item->id}}]">
                                @endif
                        @endforeach
                        </label>
                    </div>

                @elseif($itemss->desk_tipe_soal == 'Input')
                    <div class="form-check">
                        @foreach ($subj as $ite)
                            @if ($item->id == $ite->id_jawaban)
                    <input type="hidden" value="{{$item->id}}" name="id_or_jawaban[{{$items->id}}]" >
                            <input type="text" value="{{$ite->deskripsi__jawaban}}" id="sub_jawaban_us" name="sub_jawaban_us[{{$items->id}}]">
                            @endif
                        @endforeach
                            {{$item->deskripsi_jawaban}}
                    </div>
                @elseif($itemss->desk_tipe_soal == 'Radio_sub')
                    <input type="hidden" id="id_or_jawaban" value="{{$item->id}}" name="id_or_jawaban[{{$items->id}}]"> {{$item->deskripsi_jawaban}}
                    @foreach ($subj as $ite)
                        @if ('25' == $ite->id_jawaban)
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="sub_jawaban_us[{{$item->id}}]" id="sub_jawaban_us{{$e++}}" value="{{$e++}}">
                                <label class="form-check-label" for="{{$item->deskripsi_jawaban}}">
                            {{$ite->deskripsi__jawaban}}
                            </label>
                            </div>
                        @endif
                    @endforeach
            @endif
            @endif
        @endforeach
    @endif

@endforeach --}}
</div>
    @php
        $count++;
        // $a++;
        // $b++;
        // $c++;
        // $d++;
        // $e++;
    @endphp
@endforeach
<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
@foreach ($datta as $items)
    <span class="step"></span>
@endforeach
</div>
</div>
<button class="btn btn-sm btn-success" type="submit">Simpan</button>
</form>
@endsection
