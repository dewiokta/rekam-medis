<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Pemeriksaan;
use PDF;
use Illuminate\Http\Request;
// use App\Exports\PendaftaranExport;
// use Excel;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $pendaftaran = Pendaftaran::where('nama_pasien','LIKE','%'.$request->search.'%')
            ->orderBy("id",'desc')
            ->paginate(5);
        }else{
            $pendaftaran = Pendaftaran::orderBy("id",'desc')->paginate(10);
        }
        return view ('dashboard.pendaftaran.index', compact('pendaftaran'));
        // $pendaftaran = Pendaftaran::paginate(10);
        //     $sorted = $pendaftaran->sortDesc();
        
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
        $pendaftaran = new Pendaftaran;
        $pemeriksaan = new Pemeriksaan;
        $pendaftaran->tanggal=$request->input('tanggal');
        $pendaftaran->nama_pasien=$request->input('nama_pasien');
        $pendaftaran->kepala_keluarga=$request->input('kepala_keluarga');
        $pendaftaran->nik=$request->input('nik');
        $pendaftaran->tanggal_lahir=$request->input('tanggal_lahir');
        $pendaftaran->agama=$request->input('agama');
        $pendaftaran->alamat=$request->input('alamat');
        $pendaftaran->nomer_telepon=$request->input('nomer_telepon');
        $pendaftaran->keluhan=$request->input('keluhan');
        
        $pendaftaran->save();
        $pemeriksaan -> pendaftaran_id = $pendaftaran->id;
        $pemeriksaan->save();
        return redirect('/dashboard/pendaftaran')->with('succsess','Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        
        return view('dashboard.pendaftaran.edit', ['data'=>$pendaftaran]); 
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $pendaftaran = Pendaftaran::find($id);
        $pendaftaran->tanggal=$request->tanggal;
        $pendaftaran->nama_pasien=$request->nama_pasien;
        $pendaftaran->kepala_keluarga=$request->kepala_keluarga;
        $pendaftaran->nik=$request->nik;
        $pendaftaran->tanggal_lahir=$request->tanggal_lahir;
        $pendaftaran->agama=$request->agama;
        $pendaftaran->alamat=$request->alamat;
        $pendaftaran->nomer_telepon=$request->nomer_telepon;
        $pendaftaran->keluhan=$request->keluhan;
        
        $pendaftaran->save();
        return redirect('/dashboard/pendaftaran')->with('succsess','Data Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pends = Pendaftaran::destroy($id);
        return redirect()->route('pendaftaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function search(Request $request){

    }
    public function pendaftaranPDF() {
       
        $data = Pendaftaran::all();
        view()->share('data',$data);
        $pdf = PDF::loadView('/dashboard/pendaftaran/pendaftaran-pdf')->setPaper('a4', 'landscape');;
        
        return $pdf->download('Pendaftaran Umum.pdf');
        
      }
    
}
