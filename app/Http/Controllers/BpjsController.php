<?php

namespace App\Http\Controllers;

use App\Models\Bpjs;
use App\Models\Pemeriksaanfree;
use Illuminate\Http\Request;
use PDF;

class BpjsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $bpjs = Bpjs::where('nama_peserta','LIKE','%'.$request->search.'%')
            ->orderBy("id",'desc')
            ->paginate(5);
        }else{
            $bpjs = Bpjs::orderBy("id",'desc')->paginate(10);
        }
        
        return view ('dashboard.bpjs.index', compact('bpjs'));
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
        $bpjs = new Bpjs;
        $pemeriksaanfree = new Pemeriksaanfree;
        $bpjs->tanggal=$request->input('tanggal');
        $bpjs->nama_peserta=$request->input('nama_peserta');
        $bpjs->kepala_keluarga=$request->input('kepala_keluarga');
        $bpjs->nomer_peserta=$request->input('nomer_peserta');
        $bpjs->tanggal_lahir=$request->input('tanggal_lahir');
        $bpjs->agama=$request->input('agama');
        $bpjs->alamat=$request->input('alamat');
        $bpjs->nomer_telepon=$request->input('nomer_telepon');
        $bpjs->keluhan=$request->input('keluhan');
        

        $bpjs->save();
        $pemeriksaanfree -> bpjs_id = $bpjs->id;
        $pemeriksaanfree->save();
        return redirect('/dashboard/bpjs')->with('succsess','Data Saved');

        // $bpjs->save();
        // return redirect('/dashboard/bpjs')->with('succsess','Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bpjs  $bpjs
     * @return \Illuminate\Http\Response
     */
    public function show(bpjs $bpjs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bpjs  $bpjs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bpjs = Bpjs::find($id);
        
        return view('dashboard.bpjs.edit', ['data'=>$bpjs]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bpjs  $bpjs
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        $bpjs = Bpjs::find($id);
        $bpjs->tanggal=$request->tanggal;
        $bpjs->nama_peserta=$request->nama_peserta;
        $bpjs->kepala_keluarga=$request->kepala_keluarga;
        $bpjs->nomer_peserta=$request->nomer_peserta;
        $bpjs->tanggal_lahir=$request->tanggal_lahir;
        $bpjs->agama=$request->agama;
        $bpjs->alamat=$request->alamat;
        $bpjs->nomer_telepon=$request->nomer_telepon;
        $bpjs->keluhan=$request->keluhan;
        
        $bpjs->save();
        return redirect('/dashboard/bpjs')->with('succsess','Data Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bpjs  $bpjs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bpjs = Bpjs::destroy($id);
        return redirect()->route('bpjs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function pendaftaranBpjsPDF() {
       
        $data = Bpjs::orderBy("id",'desc')->get();
        view()->share('data',$data);
        $pdf = PDF::loadView('/dashboard/bpjs/pendaftaranBpjs-pdf')->setPaper('a4', 'landscape');;
        
        return $pdf->download('Pendaftaran Bpjs.pdf');
        
      }
}
