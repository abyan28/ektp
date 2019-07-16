<?php

namespace App\Http\Controllers\Website\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use App\Models\Provinsi;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\Kota;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;
class HomeController extends Controller
{
    //
	
	protected $pengguna;
	
	public function __construct()
	{
		$this->pengguna = new Pengguna();
	}
	
	public function index()
    {
        //
		$data['provinces'] = Provinsi::all();
		return view('website.home.index', $data);
    }
	
	public function store(Request $request)
	{
		$messages = [
			'required' => ':attribute Wajib Diisi',
			'min' => ':attribute harus diisi minimal :min karakter!',
			'max' => ':attribute Wajib Diisi maximal :max karakter!'
		];
		$request->validate([
			'id_nik' => 'required|min:16|max:16',
			'nama' => 'required|max:50',
			'tempat_lahir' => 'required|max:50',
			'tanggal_lahir' => 'required',
			'jenis_kelamin' => 'required|max:10',
			'provinsi' => 'required',
			'kota' => 'required',
			'kecamatan' => 'required',
			'desa' => 'required',
			'agama' => 'required|max:20',
			'status_perkawinan' => 'required|max:5',
			'pekerjaan' => 'required|max:30',
			'kewarganegaraan' => 'required|max:5',
			'gol_darah' => 'required|max:2',
			'foto_ktp' => 'required|image',
			'foto_bersamaktp' => 'required|image',
			'password' => 'required'
		], $messages);
		
		$request->password = bcrypt($request->password);
		
		$ktppath = $request->file('foto_ktp')->store('daftar/fotoktp');
		$bersamaktppath = $request->file('foto_bersamaktp')->store('daftar/fotobersamaktp');
		
		$qrcodestr = Crypt::encryptString($request->id_nik);
		//return($request->desa);
		$upload['foto_ktp'] = $ktppath;
		$upload['foto_bersamaktp'] = $bersamaktppath;
		$upload['qrcode_id'] = $qrcodestr;
		$upload['provinsi'] = Provinsi::find($request->provinsi)->nama;
		$upload['kota'] = Kota::find($request->kota)->nama;
		$upload['kecamatan'] = Kecamatan::find($request->kecamatan)->nama;
		$upload['desa'] = Desa::find($request->desa)->nama;
		
		$data['qrcode'] = $qrcodestr;
		
		$this->pengguna->create($request->except('foto_ktp', 'foto_bersamaktp', 'qrcode_id', 'provinsi' , 'kota', 'kecamatan', 'desa') + $upload);
		
		return view('website.qrcode.qrcode', $data);
		
		
	}
	
	public function getCities(Request $request)
	{
		$cities = Kota::where('id_provinsi', $request->id)->get();
		if($cities)
		{
			return response()->json(['success' => true, 'data' => $cities]);
		}
		return response()->json(['success' => false]);
	}
	public function getDistricts(Request $request)
	{
		$districts = Kecamatan::where('id_kota', $request->id)->get();
		if($districts)
		{
			return response()->json(['success' => true, 'data' => $districts]);
		}
		return response()->json(['success' => false]);
	}
	public function getSubDistricts(Request $request)
	{
		$subDistricts = Desa::where('id_kecamatan', $request->id)->get();
		if($subDistricts)
		{
			return response()->json(['success' => true, 'data' => $subDistricts]);
		}
		return response()->json(['success' => false]);
	}
}
