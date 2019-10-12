<?php

namespace App\Http\Controllers\Tap\Tap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Logs;
use App\Models\Kartu;
use App\Models\Alat;
use App\Models\Pendaftaran;
use App\Models\Transaksi;

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
				if($mode == "gembok" || $mode == "bpjs" || $mode == "absensi")
				{
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode]);
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
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode]);
				}
				else if($mode == "absensi")
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
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode]);
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
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode]);
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
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode]);
				}
				
			}
			else
			{
				$logs['hasil'] = 0;
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $kartu]);
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
				return response()->json(['hasil' => 'pendaftaran berhasil', 'data' => $kartu->pengguna]);
			}
			else
			{
				
				$logs['hasil'] = 0;
				$logs['uid_kartu'] = $uid;
				$logs['nama'] = 'Tak Dikenal';
				$logs['tipe_kartu'] = 'Tak Diketahui';
				$logs['ruangan'] = Alat::find($id)->ruang->nama;;
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $kartu]);
			}
		}
		
	}
	
	public function tapCardMultiPost(Request $request)
	{
		$uid = $request->uid;
		$id = $request->id;
		$kartu = Kartu::where('uid', '=', $uid)->first();
		$found = 0;
		$logs = new Logs();
		//return response()->json(['id' => $id, 'uid' => $uid]);
		if($kartu)
		{
			
			$alat = Alat::find($id);
			$mode = $alat->mode;
			$logs['hasil'] = 1;
			$logs['uid_kartu'] = $uid;
			$logs['nama'] = $kartu->pengguna->nama;
			$logs['tipe_kartu'] = $kartu->tipe;
			$logs['ruangan'] = $alat->ruang->nama;
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
				if($mode == "gembok")
				{
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode]);
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
					return response()->json(['hasil' => 'ditemukan', 'data' => $kartu->pengguna, 'mode' => $mode]);
				}
				
			}
			else
			{
				$logs['hasil'] = 0;
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $kartu]);
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
				$logs['nama'] = $kartu->pengguna->nama;
				$logs['tipe_kartu'] = $kartu->tipe;;
				$logs['ruangan'] = Alat::find($id)->ruang->nama;
				$logs->save();
				$pendaftaran->delete();
				return response()->json(['hasil' => 'pendaftaran berhasil', 'data' => $kartu->pengguna]);
			}
			else
			{
				
				$logs['hasil'] = 0;
				$logs['uid_kartu'] = $uid;
				$logs['nama'] = 'Tak Dikenal';
				$logs['tipe_kartu'] = 'Tak Diketahui';
				$logs['ruangan'] = Alat::find($id)->ruang->nama;;
				$logs->save();
				return response()->json(['hasil' => 'tak dikenal', 'data' => $kartu]);
			}
		}
		
	}
	
	public function showLogs()
	{
		$data['models'] = Logs::latest()->get();
		return view('admin.logs.index', $data);
	}
}
