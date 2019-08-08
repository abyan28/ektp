@extends('website.layout')

@section('scripts')
	<script>
		function getCities(that)
		{
			var value 		= $(that).val();
			//console.log(value);
			if(value==""){
				var html 	= '<option value="" >Silahkan pilih Kabupaten/Kota</option>';
				$("#kota").html(html);
				$("#kota").prop('disabled',true);
				return;
			}
			$.ajax({
				url:'{{ route('home.cities', 0) }}',
				method: 	"GET",
				data:  		{'id':value}
			})
			.done(function(data){
				//console.log(data);
				if(data.success==true){
					var html 	= '<option value="" >Silahkan pilih Kabupaten/Kota</option>';
						$.each(data.data , function(key, result) {
						html +='<option value="'+result.id+'">'+result.nama+'</option>';
					});
					$("#kota").html(html);
					$("#kota").prop('disabled',false);
					return;
				}
			})
			.fail(function(e) {
				alert("something wrong");
				console.log(e);
			})
		}
		function getkecamatans(that)
		{
			var value 		= $(that).val();
			//console.log(value);
			if(value==""){
				var html 	= '<option value="" >Silahkan pilih Kecamatan</option>';
				$("#kecamatan").html(html);
				$("#kecamatan").prop('disabled',true);
				return;
			}
			$.ajax({
				url:'{{ route('home.districts', 0) }}',
				method: 	"GET",
				data:  		{'id':value}
			})
			.done(function(data){
				//console.log(data);
				if(data.success==true){
					var html 	= '<option value="" >Silahkan pilih Kecamatan</option>';
						$.each(data.data , function(key, result) {
						html +='<option value="'+result.id+'">'+result.nama+'</option>';
					});
					$("#kecamatan").html(html);
					$("#kecamatan").prop('disabled',false);
					return;
				}
			})
			.fail(function(e) {
				alert("something wrong");
				console.log(e);
			})
		}
		function getdesas(that)
		{
			var value 		= $(that).val();
			//console.log(value);
			if(value==""){
				var html 	= '<option value="" >Silahkan Pilih Kelurahan/Desa</option>';
				$("#desa").html(html);
				$("#desa").prop('disabled',true);
				return;
			}
			$.ajax({
				url:'{{ route('home.subdistricts', 0) }}',
				method: 	"GET",
				data:  		{'id':value}
			})
			.done(function(data){
				//console.log(data);
				if(data.success==true){
					var html 	= '<option value="" >Silahkan Pilih Kelurahan/Desa</option>';
						$.each(data.data , function(key, result) {
						html +='<option value="'+result.id+'">'+result.nama+'</option>';
						console.log(result.id);
					});
					$("#desa").html(html);
					$("#desa").prop('disabled',false);
					return;
				}
			})
			.fail(function(e) {
				alert("something wrong");
				console.log(e);
			})
		}
		var page = 1;
		function showpage(a)
		{
			
			if(a == 'next')
			{
				if(page == 1)
				{
					document.getElementById("page1").style.display = "none";
					document.getElementById("page2").style.display = "block";
					document.getElementById("prevbtn").style.display = "block";
				}
				else if(page == 2)
				{
					document.getElementById("page2").style.display = "none";
					document.getElementById("page3").style.display = "block";
				}
				else if(page == 3)
				{
					document.getElementById("page3").style.display = "none";
					document.getElementById("page4").style.display = "block";
					document.getElementById("nextbtn").style.display = "none";
					document.getElementById("daftarbtn").style.display = "block";
				}
				page++;
			}
			else if(a == 'prev')
			{
				if(page == 2)
				{
					document.getElementById("page1").style.display = "block";
					document.getElementById("page2").style.display = "none";
					document.getElementById("prevbtn").style.display = "none";
				}
				else if(page == 3)
				{
					document.getElementById("page2").style.display = "block";
					document.getElementById("page3").style.display = "none";
				}
				else if(page == 4)
				{
					document.getElementById("page3").style.display = "block";
					document.getElementById("page4").style.display = "none";
					document.getElementById("daftarbtn").style.display = "none";
					document.getElementById("nextbtn").style.display = "block";
				}
				page--;
			}
			
		}
		function checkpassword(mode)
			{
				console.log(mode);
				if(mode == 'same')
				{
					var pass1 = document.getElementById("password").value;
					var pass2 = document.getElementById("konfirmasi_password").value;
					if(pass1 == '')
					{
						document.getElementById("daftarbtn").disabled = true;
						document.getElementById("passwordemptyalert").style.display = "block";
						
						document.getElementById("passwordmissalert").style.display = "none";
						document.getElementById("passwordmatchalert").style.display = "none";
					}
					else
					{
						document.getElementById("passwordemptyalert").style.display = "none";
						if(pass1 == pass2)
						{
							document.getElementById("passwordmissalert").style.display = "none";
							document.getElementById("passwordmatchalert").style.display = "block";
							document.getElementById("daftarbtn").disabled = false;
						}
						else
						{
							document.getElementById("daftarbtn").disabled = true;
							document.getElementById("passwordmissalert").style.display = "block";
							document.getElementById("passwordmatchalert").style.display = "none";
						}
					}
					
				}
			}
	</script>
@stop

@section('content')

<br>
<br>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card h-100">
                <div class="card-header">Daftar JUSTAP</div>

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
						<div id="page1" >
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
							<label for="tanggal_lahir">Tanggal Lahir: </label>
							<input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"></input>
						</div>
						<div class="form-group">
							<label for="jenis_kelamin">Jenis Kelamin: </label>
							<div class="controls">
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option>Silahkan Pilih Jenis Kelamin</option>
									<option value="Laki-Laki">Laki-Laki</option>
									<option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
						</div>
						</div>
						<div id="page2" style="display:none;">
						<div class="form-group">
							<label for="alamat">Alamat: </label>
							<input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat*"></input>
						</div>
						<!--div class="form-group">
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
						</div-->
						<div class="form-group">
                            <label class="col-form-label" for="provinsi">Provinsi</label>
                            <div class="controls">
								<select onchange="getCities(this)" class="form-control" id="provinsi" name="provinsi" required>
									<option>Silahkan pilih Provinsi</option>
									@foreach ($provinces as $province)
										<option value="{{ $province->id }}">{{ $province->nama }}</option>
									@endforeach
								</select>
							</div>
                        </div>
						<div class="form-group">
                            <label class="col-form-label" for="kota">Kabupaten/Kota</label>
                            <div class="controls">
                                <select onchange="getkecamatans(this)" class="form-control" id="kota" name="kota" required disabled>
                                    <option>Silahkan pilih Kabupaten/Kota</option>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-form-label" for="kecamatan">Kecamatan</label>
                            <div class="controls">
                                <select onchange="getdesas(this)" class="form-control" id="kecamatan" name="kecamatan" required disabled>
                                    <option>Silahkan pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-form-label" for="desa">Kelurahan/Desa</label>
                            <div class="controls">
                                <select class="form-control" id="desa" name="desa" required disabled>
                                    <option>Silahkan Pilih Kelurahan/Desa</option>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
							<label for="rt-rw">RT/RW: </label>
							<input type="text" class="form-control" id="rt_rw" name="rt_rw" placeholder="RT/RW*"></input>
						</div>
						</div>
						<div id="page3" style="display:none;">
						<div class="form-group">
							<label for="status_perkawinan">Status Perkawinan: </label>
							<input type="text" class="form-control" id="status_perkawinan" name="status_perkawinan" placeholder="Status Perkawinan*"></input>
						</div>
						<div class="form-group">
							<label for="agama">Agama: </label>
							<select class="form-control" id="agama" name="agama" required>
                                <option>Silahkan Pilih Agama</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Katolik">Katolik</option>
								<option value="Budha">Budha</option>
								<option value="Hindu">Hindu</option>
								<option value="Konghucu">Konghucu</option>
                            </select>
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
							<div class="controls">
                                <select class="form-control" id="gol_darah" name="gol_darah" required>
                                    <option>Silahkan Pilih Golongan Darah</option>
									<option value="A">-</option>
									<option value="A">A</option>
									<option value="AB">AB</option>
									<option value="B">B</option>
									<option value="O">O</option>
                                </select>
                            </div>
						</div>
						</div>
						<div id="page4" style="display:none;">
						<div class="form-group">
							<label for="foto_ktp">Foto KTP: </label>
							<input type="file" class="form-control" id="foto_ktp" name="foto_ktp"></input>
						</div>
						<div class="form-group">
							<label for="foto_bersamaktp">Foto Bersama KTP: </label>
							<input type="file" class="form-control" id="foto_bersamaktp" name="foto_bersamaktp"></input>
						</div>
						<div class="form-group">
							<div class="alert alert-danger" id="passwordemptyalert" style="display:none;">
								Password tidak boleh kosong
							</div>
							<label for="password">Password: </label>
							<input type="password" class="form-control" id="password" name="password" onchange="checkpassword('same')"></input>
						</div>
						<div class="form-group">
							<div class="alert alert-danger" id="passwordmissalert" style="display:none;">
								Password tidak sesuai
							</div>
							<div class="alert alert-success" id="passwordmatchalert" style="display:none;">
								Password sesuai
							</div>
							<label for="password">Konfirmasi Password: </label>
							<input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" onchange="checkpassword('same')"></input>
						</div>
						</div>
						<div class="row">
							<div class="col-md-10">
								<button type="button" class="btn btn-primary" id="prevbtn" onclick="showpage('prev')" style="display:none;">Previous</button>
							</div>
							<div class="col-md-2">
								<button type="button" class="btn btn-primary" id="nextbtn" onclick="showpage('next')">Next</button>
								<button type="submit" class="btn btn-primary" id="daftarbtn" style="display:none;" disabled>Daftar</button>
							</div>
						</div>
						
						
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection