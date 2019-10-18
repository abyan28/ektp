<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Logs extends Model
{
    //
	protected $fillable =['uid_kartu', 'hasil', 'nama', 'tipe_kartu', 'ruangan', 'mode', 'url_gambar'];
	
	public function showImage ()
    {
		return "storage/$this->url_gambar";
        if (Storage::exists($this->url_gambar)) {
            return "storage/$this->url_gambar";
        }
        return asset('static/admin/img/default.png');
    }
}
