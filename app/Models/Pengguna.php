<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $fillable = ['id_nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'alamat', 'rt_rw', 'provinsi', 
    'kota', 'kecamatan', 'desa', 'agama', 'status_perkawinan', 'pekerjaan', 'kewarganegaraan', 'gol_darah',
    'password', 'foto_ktp', 'foto_bersamaktp', 'qrcode_id', 'uid_kartu'];
}
