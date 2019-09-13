<?php

namespace App\Http\Controllers\Admin\Alat;

use App\Models\Alat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
	protected $alat;
	
	public function __construct()
    {
        $this->alat = new Alat();
    }
	 
    public function index()
    {
        //
		$data['models'] = Alat::all();
		return view('admin.alat.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
		return view('admin.alat.create');
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
		$request->validate([
            'nama' => 'required|max:50',
			'ruang_id' => 'required',
			'proxy_user' => 'required',
			'proxy_pass' => 'required'
        ]);
		if($this->ruang->create($request->all())){
			return redirect()->route('admin.alat.index')->with(['status' => 'success', 'message' => 'Save Successfully']);
		}
		return redirect()->route('admin.alat.create')->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alat  $alat
     * @return \Illuminate\Http\Response
     */
    public function show(Alat $alat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alat  $alat
     * @return \Illuminate\Http\Response
     */
    public function edit(Alat $alat)
    {
        //
		$data['model'] = $alat;
		return view('admin.alat.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alat  $alat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alat $alat)
    {
        //
		$alat->validate([
            'nama' => 'required|max:50',
			'ruang_id' => 'required',
			'proxy_user' => 'required',
			'proxy_pass' => 'required'
        ]);
		if ($ruang->update($request->all())) {
			return redirect()->route('admin.alat.index')->with(['status' => 'success', 'message' => 'Updated Successfully']);
		}
		return redirect()->route('admin.alat.edit', $alat->id)->with(['status' => 'danger', 'message' => 'Save Failed, Contact Developer']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alat  $alat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alat $alat)
    {
        //
		if ($alat->delete()) {
            return redirect()->route('admin.alat.index')->with(['status' => 'success', 'message' => 'Delete Successfully']);
        }
    }
}
