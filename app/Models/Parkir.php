<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parkir extends Model
{
    //
	protected $fillable = ['nama', 'alat_id', 'kapasitas', 'open', 'isi', 'harga_dasar', 'harga_tambahan'];
}
