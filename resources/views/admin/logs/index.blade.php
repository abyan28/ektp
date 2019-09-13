@extends('admin.layout')

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('admin.index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Log</li>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa fa-align-justify"></i> History Tapping
                </div>
                <div class="card-body">
                    @if (Session::has('status'))
                        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                    @endif
                    <table class="table table-responsive-sm table-striped table-vertical-align">
                        <thead class="thead-dark">
                        <tr>
                            <th style="width: 20px;">No</th>
							<th style="width: 110px;">Nama</th>
							<th style="width: 110px;">Ruangan</th>
							<th style="width: 110px;">Tipe Kartu</th>
                            <th style="width: 110px;">Waktu Tapping</th>
                            <th style="width: 110px;">UID Kartu</th>
							<th style="width: 110px;">Hasil</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($models as $key => $model)
                            <tr>
                                <td>{{ $key+1 }}</td>
								<td>{{ $model->nama}}</td>
								<td>{{ $model->ruangan}}</td>
								<td>{{ $model->tipe_kartu}}</td>
								<td>{{ $model->created_at}}</td>
                                <td>
									{{ $model->uid_kartu}}
                                </td>
                                <td>
									@if($model->hasil == 0)
										Tapping Gagal: Kartu Tidak Dikenal
									@else
										@if($model->hasil == 1)
											Tapping Berhasil: Kartu Dikenal
										@else
											@if($model->hasil == 2)
												Tapping Berhasil: Pendaftaran Berhasil
											@endif
										@endif
									@endif
                                </td>
                            </tr>
                        @endforeach
                        @if ($models->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center"> <b>Table Was Empty</b> </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
@stop