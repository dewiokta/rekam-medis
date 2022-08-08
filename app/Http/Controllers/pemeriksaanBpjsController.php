<?php

namespace App\Http\Controllers;

use App\Models\Bpjs;
use App\Models\Pemeriksaanbpjs;
use Illuminate\Http\Request;

class pemeriksaanBpjsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pemeriksaanbpjs::rightJoin('bpjs','bpjs.id','=','pemeriksaanbpjs.bpjs_id')
                ->select('pemeriksaanbpjs.*','bpjs.tanggal','bpjs.nama_peserta','bpjs.nomer_peserta'
                        ,'bpjs.kepala_keluarga','bpjs.alamat','bpjs.keluhan')
                ->get();
        
         return view('dashboard.pemeriksaanbpjs.index', ['pemeriksaanbpjs' => $data]);
        //return view('dashboard.pemeriksaanbpjs.index');
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pemeriksaanbpjs  $pemeriksaanbpjs
     * @return \Illuminate\Http\Response
     */
    public function show(pemeriksaanbpjs $pemeriksaanbpjs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pemeriksaanbpjs  $pemeriksaanbpjs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemeriksaanbpjs = Pemeriksaanbpjs::find($id);
        
        return view('dashboard.pemeriksaanbpjs.edit', ['data'=>$pemeriksaanbpjs]); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pemeriksaanbpjs  $pemeriksaanbpjs
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $pemeriksaanbpjs = Pemeriksaanbpjs::find($id);
        $pemeriksaanbpjs->pemeriksaanbpjs=$request->pemeriksaanbpjs;
        $pemeriksaanbpjs->diagnosa=$request->diagnosa;
        $pemeriksaanbpjs->jml_kunjungan=$request->jml_kunjungan;
        $pemeriksaanbpjs->terapi=$request->terapi;
        
        
        $pemeriksaanbpjs->save();
        return redirect('/dashboard/pemeriksaanbpjs')->with('succsess','Data Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pemeriksaanbpjs  $pemeriksaanbpjs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemeriksaanbpjs::destroy($id);
        return redirect()->route('pemeriksaanbpjs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
