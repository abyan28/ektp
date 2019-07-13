@extends('website.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Kategori</div>

                <div class="card-body">
                    
					@if (count($errors) > 0)
						<div class="alert alert-danget">
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					<form action= "{{ route('home.store') }}" method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="nik">NIK: </label>
							<input type="text" class="form-control" id="nik" name="id_nik" placeholder="NIK*"></input>
						</div>
						<div class="form-group">
							<label for="nama">Nama: </label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama*"></input>
						</div>
						<div class="form-group">
							<label for="tempat_lahir">Tempat Lahir: </label>
							<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir*"></input>
						</div>
						<div class="form-group">
							<label for="tanggal_lahir">tanggal Lahir: </label>
							<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"></input>
						</div>
						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin: </label>
							<input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin" placeholder="Jenis Kelamin*"></input>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat: </label>
							<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat*"></input>
						</div>
						<div class="form-group">
							<label for="rt-rw">RT/RW: </label>
							<input type="text" class="form-control" id="rt_rw" name="rt_rw" placeholder="RT/RW*"></input>
						</div>
						<div class="form-group">
							<label for="provinsi">Provinsi: </label>
							<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi*"></input>
						</div>
						<div class="form-group">
							<label for="kota">Kabupaten/Kota: </label>
							<input type="text" class="form-control" id="kota" name="kota" placeholder="Kabupaten/Kota*"></input>
						</div>
						<div class="form-group">
							<label for="kecamatan">Kecamatan: </label>
							<input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Kecamatan*"></input>
						</div>
						<div class="form-group">
							<label for="desa">Kelurahan/Desa: </label>
							<input type="text" class="form-control" id="desa" name="desa" placeholder="Kelurahan/Desa*"></input>
						</div>
						<div class="form-group">
							<label for="status_perkawinan">Status Perkawinan: </label>
							<input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" placeholder="Status Perkawinan*"></input>
						</div>
						<div class="form-group">
							<label for="agama">Agama: </label>
							<input type="text" class="form-control" id="agama" name="agama" placeholder="Agama*"></input>
						</div>
						<div class="form-group">
							<label for="pekerjaan">Pekerjaan: </label>
							<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan*"></input>
						</div>
						<div class="form-group">
							<label for="kewarganegaraan">Kewarganegaraan: </label>
							<input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan*"></input>
						</div>
						<div class="form-group">
							<label for="gol_darah">Golongan Darah: </label>
							<input type="text" class="form-control" id="gol_darah" name="gol_darah" placeholder="Golongan Darah*"></input>
						</div>
						<div class="form-group">
							<label for="foto_ktp">Foto KTP: </label>
							<input type="file" class="form-control" id="foto_ktp" name="foto_ktp"></input>
						</div>
						<div class="form-group">
							<label for="foto_bersamaktp">Foto Bersama KTP: </label>
							<input type="file" class="form-control" id="foto_bersamaktp" name="foto_bersamaktp"></input>
						</div>
						<div class="form-group">
							<label for="password">Password: </label>
							<input type="password" class="form-control" id="password" name="password"></input>
						</div>
						<br>
						<button type="submit" class="btn btn-primary">Daftar</input>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection