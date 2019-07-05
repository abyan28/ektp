@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    Pengguna
					<a class="btn btn-info" href= "{{ route('pengguna.create') }}">Tambah</a>
					<br>
					<input type="text" id="searchInput" onkeyup="filterFunction()" placeholder="Cari Nama...">
					<table id="datatable" class="table table-striped table-dark">
						<tr>
							<th>NIK</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
							<th>Jenis Kelamin</th>
							<th>Alamat</th>
							<th>RT/RW</th>
							<th>Provinsi</th>
							<th>Kota</th>
							<th>Kecamatan</th>
                            <th>Desa</th>
                            <th>Agama</th>
                            <th>Status Perkawinan</th>
							<th>Pekerjaan</th>
							<th>Kewarganegaraan</th>
							<th>Gol. Darah</th>
							<th>Password</th>
							<th>Foto KTP</th>
							<th>Foto All</th>
						</tr>
						@foreach($penggunas as $pengguna)
						<tr>
							<td>{{ $pengguna->id_nik }}</td>
							<td>{{ $pengguna->nama }}</td>
							<td>{{ $pengguna->tempat_lahir }}</td>
							<td>{{ $pengguna->tanggal_lahir }}</td>
							<td>{{ $pengguna->jenis_kelamin }}</td>
							<td>{{ $pengguna->alamat }}</td>
							<td>{{ $pengguna->rt_rw }}</td>
							<td>{{ $pengguna->provinsi }}</td>
							<td>{{ $pengguna->kota }}</td>
							<td>{{ $pengguna->kecamatan }}</td>
							<td>{{ $pengguna->desa }}</td>
							<td>{{ $pengguna->agama }}</td>
							<td>{{ $pengguna->status_perkawinan }}</td>
							<td>{{ $pengguna->pekerjaan }}</td>
							<td>{{ $pengguna->kewarganegaraan }}</td>
							<td>{{ $pengguna->gol_darah }}</td>
							<td>{{ $pengguna->password }}</td>
							<td>{{ $pengguna->foto_ktp }}</td>
							<td>{{ $pengguna->foto_bersamaktp }}</td>
							<td><a class="btn btn-info" href= "{{ route('pengguna.show', $pengguna->id) }}">Lihat</a></td>
							
						</tr>
						@endforeach
					</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection