<?php

namespace App\Http\Controllers\Website\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pengguna;

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
	
	public function store()
	{
	}
}
