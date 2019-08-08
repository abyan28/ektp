<?php

namespace App\Http\Controllers\Admin\Pendaftaran;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;

class PendaftaranController extends Controller
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
	
	public function buka(Request $request)
    {
        //
		
		
		$antri = Pengguna::where('status', '=', 1)->first();
		if($antri)
		{
			return redirect()->route('admin.index')->with(['status' => 'danger', 'message' => 'Pendaftaran Gagal Dibuka, Masih Terdapat Antrian']);
			
		}
		$pendaftar = Pengguna::where('id_nik', '=', $request->id_nik)->first();
		$pendaftar->status = 1;
		$pendaftar->save();
		return redirect()->route('admin.index')->with(['status' => 'success', 'message' => 'Pendaftaran Terbuka']);
		//
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
		$data['model'] = Pengguna::where('id_nik', '=', $request->id_nik)->first();
		//return $data['model'];
		return view('admin.pendaftaran.index', $data);
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
}
