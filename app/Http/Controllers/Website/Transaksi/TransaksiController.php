<?php

namespace App\Http\Controllers\Website\Transaksi;

use App\Models\Transaksi;
use App\Models\Pengguna;
use App\Models\Kartu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TransaksiController extends Controller
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
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($alat_id)
    {
        //
		//return "hi";
		//return $alat_id;
		$transaksi = Transaksi::where('alat_id', '=', $alat_id)->first();
		//return $transaksi;
		if($transaksi)
		{
			$kartu = Kartu::where('uid', '=', $transaksi->uid)->first();
			$nohp = $kartu->pengguna->nohp;
			Transaksi::where('alat_id', $alat_id)->delete();
			return response()->json(['status' => '200', 'res' => 1, 'nohp' => $nohp]);
		}
		else
		{
			return response()->json(['status' => '200', 'res' => 0, 'nohp' => 'null']);
		}
		//return $transaksi;
		//$kartu = Kartu::where('uid', '=', $transaksi->uid);
		//return response()->json(['status' => '200', 'res' => 1, 'nohp' => $kartu->pengguna->nohp]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
