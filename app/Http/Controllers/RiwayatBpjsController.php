<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bpjs;
use App\Models\Pemeriksaanfree;

class RiwayatBpjsController extends Controller
{
    public function index(Request $request)
    {
        $data = Pemeriksaanfree::join('bpjs','bpjs.id','=','pemeriksaanfree.bpjs_id')
                ->select('pemeriksaanfree.*','bpjs.tanggal','bpjs.nama_peserta','bpjs.nomer_peserta'
                        ,'bpjs.kepala_keluarga','bpjs.alamat','bpjs.keluhan')
                ->where('status','Y')
                ->orderBy("id",'desc')->paginate(10);

        return view('dashboard.riwayatbpjs.index', ['pemeriksaanfree' => $data]);
        
        
    }
}
