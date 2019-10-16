<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    //
	protected $fillable =['uid_kartu', 'hasil', 'nama', 'tipe_kartu', 'ruangan', 'mode', 'url_gambar'];
}
