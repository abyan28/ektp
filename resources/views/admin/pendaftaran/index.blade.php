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
						<div class="col-md-2">
							<h4>NIK</h4>
							<h6>Nama</h6>
							<h6>Tempat/Tgl Lahir</h6>
							<br>
							<h6>Jenis Kelamin</h6>
							<h6>Alamat</h6>
							<h6>	RT/RW</h6>
							<h6>	Kel/Desa</h6>
							<h6>	Kecamatan</h6>
							<h6>Agama</h6>
							<h6>Status Perkawinan</h6>
							<h6>Pekerjaan</h6>
							<h6>Kewarganegaraan</h6>
						</div>
						<div class="col-md-6">
							<h4>: {{$model->id_nik}}</h4>
							<h6>: {{$model->nama}}</h6>
							<h6>: {{$model->tempat_lahir}}</h6>
							<h6>&nbsp;&nbsp;{{$model->tanggal_lahir}}</h6>
							<h6>: {{$model->jenis_kelamin}}		Gol. Darah :{{$model->gol_darah}}</h6>
							<h6>: {{$model->alamat}}</h6>
							<h6>: {{$model->rt_rw}}</h6>
							<h6>: {{$model->desa}}</h6>
							<h6>: {{$model->kecamatan}}</h6>
							<h6>: {{$model->agama}}</h6>
							<h6>: {{$model->status_perkawinan}}</h6>
							<h6>: {{$model->pekerjaan}}</h6>
							<h6>: {{$model->kewarganegaraan}}</h6>
						</div>
						<div class="col-md-4">
							<br>
							<h6>Foto KTP:</h6>
							<div class="thumbnail">
                                <img class="img-thumbnail" src="{{ asset($model->showKtp()) }}" alt="">
                            </div>
							<br>
							<br>
							<br>
							<h6>Foto Bersama KTP:</h6>
							<div class="thumbnail">
                                <img class="img-thumbnail" src="{{ asset($model->showBersamaKtp()) }}" alt="">
                            </div>
						</div>
					</div>
                    <form class="form-horizontal" action="{{ route('admin.pendaftaran.buka')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="controls">
                                <input class="form-control" id="title" size="16" type="hidden" name="id_nik" placeholder="NIK" value= "{{$model->id_nik}}"required>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button class="btn btn-primary" type="submit">Buka Pendaftaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row-->
@stop