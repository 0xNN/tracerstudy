
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>

	<title>{{ $f1->nama_mahasiswa }}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />

	<meta name="keywords" content="" />
	<meta name="description" content="" />

	<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/resume.css') }}" media="all" />

</head>
<body onload="print()">

<div id="doc2" class="yui-t7">
	<div id="inner">

		<div id="hd">
			<div class="yui-gc">
				<div class="yui-u first">
					<h1>{{ $f1->nama_mahasiswa }}</h1>
					<h2>Program Studi {{ $prodi[0]['nama_program_studi'] }}</h2>
					{{-- <div class="yui-u"> --}}

						<br/>
					{{-- </div> --}}
					{{-- <div class="yui-u"> --}}
						<table>
							<tr>
								<th colspan="3">
									<div class="contact-info">
										<p><a id="pdf" href="#">STIHPADA - Palembang</a></p>
									</div><!--// .contact-info -->
								</th>
							</tr>
							<tr>
								<th width="60%">Email</th>
								<th width="5%">:</th>
								<th> {{ $f1->email }}</th>
							</tr>
							<tr>
								<th width="60%">Tahun Lulus</th>
								<th width="5%">:</th>
								<th> {{ $f1->thn_lulus }}</th>
							</tr>
							<tr>
								<th width="60%">No HP</th>
								<th width="5%">:</th>
								<th> {{ $f1->no_hp }}</th>
							</tr>
						</table>
					{{-- </div> --}}
				</div>

				<div class="yui-u">
					<img src="{{ $f1->foto_alumni }}" alt="Foto Alumni" width="100px" height="120px">
				</div>
			</div><!--// .yui-gc -->
		</div><!--// hd -->

		<div id="bd">
			<div id="yui-main">
				<div class="yui-b">

					<div class="yui-gf">
						<div class="yui-u first">
							{!! QrCode::size(80)->generate($f1->no_ijazah == null ? 'Not Found': $f1->no_ijazah); !!}
						</div>
						<div class="yui-u">
							<table width="100%">
								<tr>
									<th width="25%">NIM</th>
									<th width="2%">:</th>
									<th width="73%">{{ $f1->nim }}</th>
								</tr>
								<tr>
									<th width="25%">NIK</th>
									<th width="2%">:</th>
									<th width="73%">{{ $f1->nik }}</th>
								</tr>
								<tr>
									<th width="25%">Angkatan</th>
									<th width="2%">:</th>
									<th width="73%">{{ $f1->angkatan }}</th>
								</tr>
								<tr>
									<th width="25%">Jenis Kelamin</th>
									<th width="2%">:</th>
									<th width="73%">{{ $f1->jenis_kelamin_id == 1 ? 'Laki-laki': 'Perempuan' }}</th>
								</tr>
								<tr>
									<th width="25%">Tempat/Tanggal Lahir</th>
									<th width="2%">:</th>
									<th width="73%">{{ $f1->tmp_lahir }} / {{ $f1->tgl_lahir }}</th>
								</tr>
								<tr>
									<th width="25%">Alamat</th>
									<th width="2%">:</th>
									<th width="73%">{{ $f1->alamat }}</th>
								</tr>
							</table>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Kelulusan</h2>
						</div>
						<div class="yui-u">

								<div class="talent">
									<h2>Tanggal Selesai</h2>
									<p>{{ Carbon\Carbon::parse($f1->tgl_selesai)->isoFormat('dddd, D MMMM Y') }}</p>
								</div>

								<div class="talent">
									<h2>Tanggal Kompre</h2>
									<p>{{ Carbon\Carbon::parse($f1->tgl_kompre)->isoFormat('dddd, D MMMM Y') }}</p>
								</div>

								<div class="talent">
									<h2>Tanggal Wisuda</h2>
									<p>{{ Carbon\Carbon::parse($f1->tgl_wisuda)->isoFormat('dddd, D MMMM Y') }}</p>
								</div>
						</div>
					</div><!--// .yui-gf -->

					<div class="yui-gf">
						<div class="yui-u first">
							<h2>Tempat Kerja</h2>
						</div>
						<div class="yui-u">
							<ul class="talent">
								<li>Perusahaan/Instansi</li>
								<li>{{ $f1->tempat_kerja == null ? '-': $f1->tempat_kerja}}</li>
								<li class="last">{{ $f1->no_telp_tmpt_kerja == null ? '-': $f1->no_telp_tmpt_kerja }}</li>
							</ul>

							<ul class="talent">
								<li>Jabatan</li>
								<li>{{ $f1->jabatan== null ? '-': $f1->jabatan }}</li>
								<li class="last">{{ $f1->alamat_tempat_kerja == null ? '-': $f1->alamat_tempat_kerja}}</li>
							</ul>

							{{-- <ul class="talent">
								<li>Ibu</li>
								<li>Windows XP/Vista</li>
								<li class="last">Linux</li>
							</ul> --}}
						</div>
					</div><!--// .yui-gf-->

					{{-- <div class="yui-gf">

						<div class="yui-u first">
							<h2>Experience</h2>
						</div><!--// .yui-u -->

						<div class="yui-u">

							<div class="job">
								<h2>Facebook</h2>
								<h3>Senior Interface Designer</h3>
								<h4>2005-2007</h4>
								<p>Intrinsicly enable optimal core competencies through corporate relationships. Phosfluorescently implement worldwide vortals and client-focused imperatives. Conveniently initiate virtual paradigms and top-line convergence. </p>
							</div>

							<div class="job">
								<h2>Apple Inc.</h2>
								<h3>Senior Interface Designer</h3>
								<h4>2005-2007</h4>
								<p>Progressively reconceptualize multifunctional "outside the box" thinking through inexpensive methods of empowerment. Compellingly morph extensive niche markets with mission-critical ideas. Phosfluorescently deliver bricks-and-clicks strategic theme areas rather than scalable benefits. </p>
							</div>

							<div class="job">
								<h2>Microsoft</h2>
								<h3>Principal and Creative Lead</h3>
								<h4>2004-2005</h4>
								<p>Intrinsicly transform flexible manufactured products without excellent intellectual capital. Energistically evisculate orthogonal architectures through covalent action items. Assertively incentivize sticky platforms without synergistic materials. </p>
							</div>


							<div class="job last">
								<h2>International Business Machines (IBM)</h2>
								<h3>Lead Web Designer</h3>
								<h4>2001-2004</h4>
								<p>Globally re-engineer cross-media schemas through viral methods of empowerment. Proactively grow long-term high-impact human capital and highly efficient innovation. Intrinsicly iterate excellent e-tailers with timely e-markets.</p>
							</div>

						</div><!--// .yui-u -->
					</div><!--// .yui-gf -->


					<div class="yui-gf last">
						<div class="yui-u first">
							<h2>Education</h2>
						</div>
						<div class="yui-u">
							<h2>Indiana University - Bloomington, Indiana</h2>
							<h3>Dual Major, Economics and English &mdash; <strong>4.0 GPA</strong> </h3>
						</div>
					</div><!--// .yui-gf --> --}}


				</div><!--// .yui-b -->
			</div><!--// yui-main -->
		</div><!--// bd -->

		<div id="ft">
			<p>{{ $profilpt[0]['nama_perguruan_tinggi'] }} &mdash; <a href="mailto:{{ $profilpt[0]['email'] }}">{{ $profilpt[0]['email'] }}</a> &mdash; {{ $profilpt[0]['telepon'] }}</p>
		</div><!--// footer -->

	</div><!-- // inner -->


</div><!--// doc -->


</body>
</html>

