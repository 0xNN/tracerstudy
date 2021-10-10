<table>
  <thead>
    <tr>
      <th>kdptimsmh</th>
      <th>kdpstmsmh</th>
      <th>nimhsmsmh</th>
      <th>nmmhsmsmh</th>
      <th>telpomsmh</th>
      <th>emailmsmh</th>
      <th>tahun_lulus</th>
      @foreach ($kode as $item)
        <th>{{ $item->kode }}</th>
      @endforeach
    </tr>
  </thead>
  <tbody>
    @foreach ($F1 as $item)
      <tr>
        <td>{{ $item->kode_pt }}</td>
        <td>{{ $item->kode_prodi }}</td>
        <td>{{ $item->nim }}</td>
        <td>{{ $item->nama_mahasiswa }}</td>
        <td>{{ $item->no_hp }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ date('Y', strtotime($item->tgl_wisuda)) }}</td>
        @foreach ($kode as $k)
          @if ($k->user_id == $item->user_id)
            <td>{{ $k->isi }}</td>
          @endif
        @endforeach
      </tr>
    @endforeach
  </tbody>
</table>