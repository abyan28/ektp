@extends('admin.layout')

@section('styles')
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
@stop

@section('scripts')
    
@stop

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">Pendaftaran</li>
    <li class="breadcrumb-item active">Pencarian NRP</li>
@stop

@section('content')
    <!-- /.row-->
	<script>
		console.log("{{$model}}");
	</script>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-edit"></i>Data Pendaftaran</div>
                <div class="card-body">
                    @if (Session::has('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                    @endif
                    @if ($errors->any())
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">{{ $error }}</div>
                        @endforeach
                    @endif
					<div class="row">
						<div class="col-md-5">
							<table>
								<tr>
									<td>NIK</td>
									<td>: {{$model->id_nik}}</td>
								</tr>
								<tr>
									<td>Nama</td>
									<td>: {{$model->name}}</td>
								</tr>
								<tr>
									<td>NRP</td>
									<td>: {{$model->nrp}}</td>
								</tr>
								<tr>
									<td>Jenis Kelamin</td>
									<td>: {{$model->jenis_kelamin}}</td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>: {{$model->alamat}}</td>
								</tr>
								<tr>
									<td>Email</td>
									<td>: {{$model->email}}</td>
								</tr>
								<tr>
									<td>Nomor HP</td>
									<td>: {{$model->nohp}}</td>
								</tr>
							</table>
						</div>
						<div class="col-md-7">
							<form class="form-horizontal" action="{{ route('admin.pendaftaran.buka')}}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}
								<div class="form-group">
									<div class="card">
										<div class="card-header">
											<h5>Hak Akses Penggunaan</h5>
										</div>
										<div class="card-body">
										@foreach($rooms as $ruang)
											@php
											$found = 0;
											@endphp
											@foreach($model->ruangs as $regrooms)
												@if($regrooms->id == $ruang->id)
													@php
													$found=1;
													@endphp
												@endif
											@endforeach
											<div class="checkbox">
												<label><input type="checkbox" name="hak_akses[]" value="{{$ruang->id}}" @if($found == 1) checked @endif>{{$ruang->nama}}</label>
											</div>
											
										@endforeach
										</div>
									</div>
									<div class="controls">
										<input class="form-control" id="id" type="hidden" name="pengguna_id" value= "{{$model->id}}"required>
									</div>
									<div class="card">
										<div class="card-header">
											<h5>Detil Pendaftaran</h5>
										</div>
										<div class="card-body">
											<div class="controls">
												<label for="tipe">Tipe Kartu Yang Didaftarkan:</label>
												<select class="form-control" id="tipe" name="tipe" required>
													<option value="">Silahkan Pilih Jenis Kartu</option>
													<option value="KTM">KTM</option>
													<option value="KTP">KTP</option>
													<option value="Lainnya">Lainnya</option>
												</select>
												<br>
												<label for="alat_id">Alat yang Digunakan Untuk Mendaftar:</label>
												<select class="form-control" id="alat_id" name="alat_id" required>
													<option value="">Silahkan Pilih Alat yang Digunakan</option>
													@foreach($alats as $alat)
														<option value="{{$alat->id}}">{{$alat->nama}} (Ruang {{$alat->ruang->nama}})</option>
													@endforeach
												</select>
											</div>
										</div>
									</div>
								</div>
                        
								<div class="form-actions">
									<button class="btn btn-primary" type="submit">Buka Pendaftaran</button>
								</div>
							</form>
						</div>
					</div>
                    
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
@stop