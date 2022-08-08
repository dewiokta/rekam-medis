<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{

    public function index(Request $request)
    {
        $pemeriksaan = Pemeriksaan::join('pendaftarans','pendaftarans.id','=','pemeriksaans.pendaftaran_id')
            ->select('pemeriksaans.*','pendaftarans.tanggal','pendaftarans.nama_pasien','pendaftarans.nik'
                        ,'pendaftarans.kepala_keluarga','pendaftarans.alamat','pendaftarans.keluhan')
            ->where('status','Y')->orderBy("id",'desc')->paginate(10);

        return view('dashboard.riwayat.index', ['pemeriksaan' => $pemeriksaan]);
        
        
    }
}