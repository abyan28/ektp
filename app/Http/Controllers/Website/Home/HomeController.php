<?php

namespace App\Http\Controllers\Website\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;
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
		return view('website.home.index');
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
			'provinsi' => 'required|max:50',
			'kota' => 'required|max:50',
			'kecamatan' => 'required|max:50',
			'desa' => 'required|max:50',
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
		
		$upload['foto_ktp'] = $ktppath;
		$upload['foto_bersamaktp'] = $bersamaktppath;
		$upload['qrcode_id'] = $qrcodestr;
		
		$data['qrcode'] = $qrcodestr;
		
		$this->pengguna->create($request->except('foto_ktp', 'foto_bersamaktp', 'qrcode_id') + $upload);
		
		return view('website.qrcode.qrcode', $data);
		
		
	}
}
