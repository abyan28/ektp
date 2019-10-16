<?php

namespace App\Http\Controllers\Tap\Tap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Logs;
use App\Models\Kartu;
use App\Models\Alat;
use App\Models\Setting;
use App\Models\Pasien;
use App\Models\Pendaftaran;
use App\Models\Transaksi;
use Carbon\Carbon;

class TappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	/*
	public function tapCard($id)
	{
		$pengguna = Pengguna::where('uid_kartu', '=', $id)->first();
		$found = 0;
		$logs = new Logs();
		if($pengguna)
		{
			$logs['hasil'] = 0;
			$logs['uid_kartu'] = $id;
			$logs['nama'] = $pengguna['nama'];
			$logs['tipe_kartu'] = 'detectable';
			$logs['ruangan'] = 'LAB MI';
			$logs->save();
			return response()->json(['hasil' => 'ditemukan', 'data' => $pengguna]);
		}
		else
		{
			$pengguna = Pengguna::where('status', '=', 1)->first();
			if($pengguna)
			{
				$logs['hasil'] = 2;
				$logs['uid_kartu'] = $id;
				$logs['nama'] = $pengguna['nama'];
				$logs['tipe_kartu'] = 'detectable';
				$logs['ruangan'] = 'LAB MI';
				$logs->save();
				$pengguna->status = 2;
				$pengguna->uid_kartu = $id;
				$pengguna->save();
				return response()->json(['hasil' => 'pendaftaran berhasil', 'data' => $pengguna]);
			}
			else
			{
				
				$logs['hasil'] = 0;
				$logs['uid_kartu'] = $id;
				$logs['nama'] = 'Tak Dikenal';
				$logs['tipe_kartu'] = 'detectable';
				$logs['ruangan'] = 'LAB MI';
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $pengguna]);
			}
		}
		
	}
	public function tapCardPost(Request $request)
	{
		$id = $request->uid;
		$pengguna = Pengguna::where('uid_kartu', '=', $id)->first();
		$found = 0;
		if($pengguna)
		{
			return response()->json(['hasil' => 'ditemukan', 'data' => $pengguna]);
		}
		else
		{
			$pengguna = Pengguna::where('status', '=', 1)->first();
			if($pengguna)
			{
				$pengguna->status = 2;
				$pengguna->uid_kartu = $id;
				$pengguna->save();
				return response()->json(['hasil' => 'pendaftaran berhasil', 'data' => $pengguna]);
			}
			else
			{
				return response()->json(['hasil' => 'tak dikenal', 'data' => $pengguna]);
			}
		}
		
	}
	*/
	public function tapCardMulti($id, $uid)
	{
		$kartu = Kartu::where('uid', '=', $uid)->first();
		$found = 0;
		$logs = new Logs();
		if($kartu)
		{
			$alat = Alat::find($id);
			$mode = $alat->mode;
			$logs['hasil'] = 1;
			$logs['uid_kartu'] = $uid;
			$logs['nama'] = $kartu->pengguna->name;
			$logs['tipe_kartu'] = $kartu->tipe;
			$logs['ruangan'] = $alat->ruang->nama;
			$logs['mode'] = $alat->mode;
			$roomid =$alat->ruang->id;
			$found = 0;
			foreach($kartu->pengguna->ruangs as $ruang)
			{
				if($ruang->id == $roomid)
				{
					$found = 1;
				}
			}
			if($found == 1)
			{
				$logs['hasil'] = 1;
				$logs->save();
				if($mode == "gembok" || $mode == "absensi" || $mode == "bpjs" || $mode == "faskes1")
				{
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode, 'log' => $logs->id, 'uid' => $uid]);
				}
				else if($mode == "transaksi")
				{
					$transaction = Transaksi::where('alat_id', '=', $id)->first();
					if($transaction)
					{
						$transaction->uid = $uid;
					}
					else
					{
						$transaction = new Transaksi();
						$transaction->alat_id = $id;
						$transaction->uid = $uid;
					}
					$transaction->save();
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode, 'log' => $logs->id, 'uid' => $uid]);
				}
				
				
			}
			else
			{
				$logs['hasil'] = 0;
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $kartu, 'log' => $logs->id]);
			}
			
		}
		else
		{
			$pendaftaran = Pendaftaran::where('alat_id', '=', $id)->first();
			if($pendaftaran)
			{
				$kartus = (Pengguna::find($pendaftaran->pengguna->id))->kartus;
				$kartu = new Kartu();
				foreach($kartus as $card)
				{
					if($card->tipe == $pendaftaran->tipe)
					{
						$found = 1;
						$card->uid = $uid;
						$card->save();
						$kartu = $card;
						break;
					}
				}
				if($found == 0)
				{
					
					$kartu->pengguna_id = $pendaftaran->pengguna->id;
					$kartu->uid = $uid;
					$kartu->tipe = $pendaftaran->tipe;
					$kartu->save();
				}
				$logs['hasil'] = 2;
				$logs['uid_kartu'] = $uid;
				$logs['nama'] = $kartu->pengguna->name;
				$logs['tipe_kartu'] = $kartu->tipe;;
				$logs['ruangan'] = Alat::find($id)->ruang->nama;
				$logs->save();
				$pendaftaran->delete();
				return response()->json(['hasil' => 'pendaftaran berhasil', 'data' => $kartu->pengguna, 'log' => $logs->id, 'uid' => $uid]);
			}
			else
			{
				
				$logs['hasil'] = 0;
				$logs['uid_kartu'] = $uid;
				$logs['nama'] = 'Tak Dikenal';
				$logs['tipe_kartu'] = 'Tak Diketahui';
				$logs['ruangan'] = Alat::find($id)->ruang->nama;;
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $kartu, 'log' => $logs->id, 'uid' => $uid]);
			}
		}
		
	}
	
	public function tapCardMultiPost(Request $request)
	{
		$kartu = Kartu::where('uid', '=', $uid)->first();
		$found = 0;
		$logs = new Logs();
		if($kartu)
		{
			$alat = Alat::find($id);
			$mode = $alat->mode;
			$logs['hasil'] = 1;
			$logs['uid_kartu'] = $uid;
			$logs['nama'] = $kartu->pengguna->name;
			$logs['tipe_kartu'] = $kartu->tipe;
			$logs['ruangan'] = $alat->ruang->nama;
			$logs['mode'] = $alat->mode;
			$roomid =$alat->ruang->id;
			$found = 0;
			foreach($kartu->pengguna->ruangs as $ruang)
			{
				if($ruang->id == $roomid)
				{
					$found = 1;
				}
			}
			if($found == 1)
			{
				$logs['hasil'] = 1;
				$logs->save();
				if($mode == "gembok" || $mode == "absensi" || $mode == "bpjs" || $mode == "faskes1")
				{
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode, 'log' => $logs->id, 'uid' => $uid]);
				}
				else if($mode == "transaksi")
				{
					$transaction = Transaksi::where('alat_id', '=', $id)->first();
					if($transaction)
					{
						$transaction->uid = $uid;
					}
					else
					{
						$transaction = new Transaksi();
						$transaction->alat_id = $id;
						$transaction->uid = $uid;
					}
					$transaction->save();
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode, 'log' => $logs->id, 'uid' => $uid]);
				}
				
				
			}
			else
			{
				$logs['hasil'] = 0;
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $kartu, 'log' => $logs->id]);
			}
			
		}
		else
		{
			$pendaftaran = Pendaftaran::where('alat_id', '=', $id)->first();
			if($pendaftaran)
			{
				$kartus = (Pengguna::find($pendaftaran->pengguna->id))->kartus;
				$kartu = new Kartu();
				foreach($kartus as $card)
				{
					if($card->tipe == $pendaftaran->tipe)
					{
						$found = 1;
						$card->uid = $uid;
						$card->save();
						$kartu = $card;
						break;
					}
				}
				if($found == 0)
				{
					
					$kartu->pengguna_id = $pendaftaran->pengguna->id;
					$kartu->uid = $uid;
					$kartu->tipe = $pendaftaran->tipe;
					$kartu->save();
				}
				$logs['hasil'] = 2;
				$logs['uid_kartu'] = $uid;
				$logs['nama'] = $kartu->pengguna->name;
				$logs['tipe_kartu'] = $kartu->tipe;;
				$logs['ruangan'] = Alat::find($id)->ruang->nama;
				$logs->save();
				$pendaftaran->delete();
				return response()->json(['hasil' => 'pendaftaran berhasil', 'data' => $kartu->pengguna, 'log' => $logs->id, 'uid' => $uid]);
			}
			else
			{
				
				$logs['hasil'] = 0;
				$logs['uid_kartu'] = $uid;
				$logs['nama'] = 'Tak Dikenal';
				$logs['tipe_kartu'] = 'Tak Diketahui';
				$logs['ruangan'] = Alat::find($id)->ruang->nama;;
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $kartu, 'log' => $logs->id, 'uid' => $uid]);
			}
		}
		
	}
	
	public function showLogs()
	{
		$data['models'] = Logs::latest()->get();
		return view('admin.logs.index', $data);
	}
	public function sendImages(Request $request)
	{
		//store file
		//return response()->json(['hasil' => $request->uid]);
		$uid = $request->uid;
		$alat = Alat::find($request->id);
		$id = $request->id;
		$kartu = Kartu::where('uid', '=', $uid)->first();
		$mode=$alat->mode;
		$found = 0;
		$img = $request->file('img');
		$str2 = (string)Carbon::now();
		$str1 = (string)($kartu->pengguna->id);
		$str = 'logs/photos/'.$str1;
		$path = $img->store($str);
		$log = Logs::find($request->logid);
		$log->url_gambar = $path;
		$status = $request->status;
		
		if($status == 'ACCEPTED')
		{
			$log->hasil = 3;
			$log->save();
			if($mode=='bpjs')
			{
				$transaction = Transaksi::where('alat_id', '=', $id)->first();
				if($transaction)
				{
					$transaction->uid = $uid;
				}
				else
				{
					$transaction = new Transaksi();
					$transaction->alat_id = $id;
					$transaction->uid = $uid;
				}
				$idpengguna = $kartu->pengguna->id;
				$pasiens = Pasien::where('pengguna_id', '=', $idpengguna)->where('status', '=', 0)->get();
				$bpjs = $kartu->pengguna->bpjs->first();
				//return response()->json(['hasil' => 'ditemukan', 'data' => $bpjs->batas_pembayaran, 'mode' => $mode]);
				$status = 0;
				//$time = Carbon::now();
				//return response()->json(['hasil' => 'ditemukan', 'data' => ($bpjs->batas_pembayaran > Carbon::now()), 'mode' => $mode]);
				if(($bpjs->batas_pembayaran > Carbon::now()))
				{
					$status =1 ;
				}
				else
				{
					$now = Carbon::now();
					$diff = $now->diffinDays($bpjs->batas_pembayaran);	
					//return response()->json(['hasil' => 'ditemukan', 'bpjs' => $diff, 'mode' => $mode]);
					if($diff < 30)
					{
						$status =1 ;
					}
				}
				if($status == 1)
				{
					if($pasiens->count() >= 1)
					{
						$transaction->save();
						return response()->json(['hasil' => 'ditemukan', 'bpjs' => 'BPJS Diaktifkan', 'mode' => $mode, 'log' => $log->id]);
					}
					else
					{
						return response()->json(['hasil' => 'ditemukan', 'bpjs' => 'Rujukan Tak Ditemukan', 'mode' => $mode, 'log' => $log->id]);
					}
				}
				else
				{
					return response()->json(['hasil' => 'ditemukan', 'bpjs' => 'BPJS Belum Dibayar', 'mode' => $mode, 'log' => $log->id]);
				}
			}
			else if($mode=='faskes1')
			{
				$transaction = Transaksi::where('alat_id', '=', $id)->first();
				if($transaction)
				{
					$transaction->uid = $uid;
				}
				else
				{
					$transaction = new Transaksi();
					$transaction->alat_id = $id;
					$transaction->uid = $uid;
				}
				$idpengguna = $kartu->pengguna->id;
				
				
				
				$bpjs = $kartu->pengguna->bpjs->first();
				//return response()->json(['hasil' => 'ditemukan', 'data' => $bpjs->batas_pembayaran, 'mode' => $mode]);
				$status = 0;
				//$time = Carbon::now();
				//return response()->json(['hasil' => 'ditemukan', 'data' => ($bpjs->batas_pembayaran > Carbon::now()), 'mode' => $mode]);
				if(($bpjs->batas_pembayaran > Carbon::now()))
				{
					$status =1 ;
				}
				else
				{
					$now = Carbon::now();
					$diff = $now->diffinDays($bpjs->batas_pembayaran);	
					//return response()->json(['hasil' => 'ditemukan', 'bpjs' => $diff, 'mode' => $mode]);
					if($diff < 30)
					{
						$status =1 ;
					}
				}
				if($status == 1)
				{
					$pasien = new Pasien();
					$pasien->faskes_tingkat1 = "Faskes 1";
					$pasien->pengguna_id = $idpengguna;
					
					$setting = Setting::first();
					$pasien->rs_perujuk = $setting->rs_nama;
					$pasien->faskes_tingkat1 = $setting->rs_nama;
					$noantri = $setting->index_antrian;
					$setting->index_antrian = $noantri + 1;
					$pasien->nomor_antrian = $noantri + 1;
					$pasien->status = -1;
					$setting->save();
					$pasien->save();
					$transaction->save();
					return response()->json(['hasil' => 'ditemukan', 'bpjs' => 'Pendaftaran Bpjs Berhasil', 'mode' => $mode, 'no' => ($noantri+1), 'log' => $log->id]);
				}
				else
				{
					return response()->json(['hasil' => 'ditemukan', 'bpjs' => 'BPJS Belum Dibayar', 'mode' => $mode, 'log' => $log->id]);
				}
			}
			else if($mode=='checkin')
			{
				return response()->json(['hasil' => 'ditemukan', 'status' => 'sukses', 'mode' => $mode, 'log' => $log->id]);
			}
			else if($mode=='gembok')
			{
				return response()->json(['hasil' => 'ditemukan', 'status' => 'sukses', 'mode' => $mode, 'log' => $log->id]);
			}
			else if($mode=='absensi')
			{
				return response()->json(['hasil' => 'ditemukan', 'status' => 'sukses', 'mode' => $mode, 'log' => $log->id]);
			}
			
		}
		else
		{
			$log->hasil = 2;
			$log->save();
			return response()->json(['hasil' => 'mismatch', 'mode' => $mode, 'log' => $logs->id]);
		}
				
	}
}
