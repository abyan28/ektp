<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class Pengguna extends Authenticatable
{
	use Notifiable;
	protected $guard = 'pendaftar';
    protected $fillable = ['id_nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'rt_rw', 'provinsi', 
    'kota', 'kecamatan', 'desa', 'agama', 'status_perkawinan', 'pekerjaan', 'kewarganegaraan', 'gol_darah',
    'password', 'foto_ktp', 'foto_bersamaktp', 'qrcode_id', 'uid_kartu', 'status'];
	
	public function showKtp ()
    {
        if (Storage::exists($this->foto_ktp)) {
            return "storage/$this->foto_ktp";
        }
        return asset('static/admin/img/default.png');
    }
	
	public function showBersamaKtp ()
    {
        if (Storage::exists($this->foto_bersamaktp)) {
            return "storage/$this->foto_bersamaktp";
        }
        return asset('static/admin/img/default.png');
    }
	
	
}
