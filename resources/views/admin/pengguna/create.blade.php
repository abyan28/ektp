@extends('admin.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Pengguna</div>

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
					<form action= "{{ route('pustakawan.store') }}" enctype="multipart/form-data" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="NIK">NIK: </label>
							<input type="text" class="form-control" id="Nama" name="id_nik" placeholder="NIK*"></input>
						</div>
                        <br>
                        <div class="form-group">
							<label for="Nama">Nama: </label>
							<input type="text" class="form-control" id="Nama" name="nama" placeholder="Nama*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="TempatLahir">Tempat Lahir: </label>
							<input type="text" class="form-control" id="TempatLahir" name="tempat_lahir" placeholder="Tempat Lahir*"></input>
						</div>
                        <br>
                        <div class="form-group">
							<label for="TanggalLahir">Tanggal Lahir: </label>
							<input type="text" class="form-control" id="TanggalLahir" name="tanggal_lahir" placeholder="Tanggal Lahir*"></input>
						</div>
                        <br>
						<div class="form-group">
							<label for="JenisKelamin">Tanggal Lahir: </label>
							<input type="text" class="form-control" id="JenisKelamin" name="jenis_kelamin" placeholder="Jenis Kelamin*"></input>
						</div>
                        <br>
						<div class="form-group">
							<label for="Alamat">Alamat: </label>
							<input type="text" class="form-control" id="Alamat" name="alamat" placeholder="Alamat*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="RT/RW">RT/RW: </label>
							<input type="text" class="form-control" id="RT/RW" name="rt_rw" placeholder="RT/RW*"></input>
						</div>
						<br>
						<div class="form-group">
							<label for="Provinsi">Provinsi: </label>
							<input type="text" class="form-control" id="Provinsi" name="provinsi" placeholder="Provinsi*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="Kota">Kota: </label>
							<input type="text" class="form-control" id="Kota" name="kota" placeholder="Kota*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="Kecamatan">Kecamatan: </label>
							<input type="text" class="form-control" id="Kecamatan" name="kecamatan" placeholder="Kecamatan*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="Desa">Desa: </label>
							<input type="text" class="form-control" id="Desa" name="desa" placeholder="Desa*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="Agama">Agama: </label>
							<input type="text" class="form-control" id="Agama" name="agama" placeholder="Agama*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="StatusPerkawinan">Status Perkawinan: </label>
							<input type="text" class="form-control" id="StatusPerkawinan" name="status_perkawinan" placeholder="Status Perkawinan*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="Pekerjaan">Pekerjaan: </label>
							<input type="text" class="form-control" id="Pekerjaan" name="pekerjaan" placeholder="Pekerjaan*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="Kewarganegaraan">Kewarganegaraan: </label>
							<input type="text" class="form-control" id="Kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="GolDarah">Golongan Darah: </label>
							<input type="text" class="form-control" id="GolDarah" name="gol_darah" placeholder="Golongan Darah*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="Password">Password: </label>
							<input type="text" class="form-control" id="Password" name="password" placeholder="Password*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="FotoKTP">Foto KTP: </label>
							<input type="file" capture="camera" class="form-control" id="FotoKTP" name="foto_ktp" placeholder="Foto KTP*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="FotoBersamaKTP">Foto Orang dan KTP: </label>
							<input type="file" capture="camera" class="form-control" id="FotoBersamaKTP" name="foto_bersamaktp" placeholder="Foto Orang dan KTP*"></input>
						</div>
						<br>
                        <div class="form-group">
							<label for="Notelp">Bagian Pekerjaan: </label>
							<select class="form-control" id="jobdesc" name="jobdesc_id"></input>
								<option value="null">Please select Job Description</option>
								@foreach ($jobdescs as $jobDesc)
									<option value="{{ $jobDesc->id }}">{{ $jobDesc->name }}</option>
								@endforeach
							</select>
						</div>
						<br>
						<button type="submit" class="btn btn-primary">Tambah</input>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection