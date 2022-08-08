<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use PDF;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $pemeriksaan = Pendaftaran::where('nama_pasien', 'LIKE', '%' . $request->search . '%')
                ->orderBy("id", 'desc')
                ->paginate(10);
        } else {
            $pemeriksaan = Pemeriksaan::join('pendaftarans', 'pendaftarans.id', '=', 'pemeriksaans.pendaftaran_id')
                ->select(
                    'pemeriksaans.*',
                    'pendaftarans.tanggal',
                    'pendaftarans.nama_pasien',
                    'pendaftarans.nik',
                    'pendaftarans.kepala_keluarga',
                    'pendaftarans.alamat',
                    'pendaftarans.keluhan'
                )
                ->where('status', 'N')
                ->orderBy("id", 'desc')
                ->paginate(10);
        }

        return view('dashboard.pemeriksaan.index', ['pemeriksaan' => $pemeriksaan]);
        // $data = Pemeriksaan::join('pendaftarans','pendaftarans.id','=','pemeriksaans.pendaftaran_id')
        //         ->select('pemeriksaans.*','pendaftarans.tanggal','pendaftarans.nama_pasien','pendaftarans.nik'
        //                 ,'pendaftarans.kepala_keluarga','pendaftarans.alamat','pendaftarans.keluhan')
        //         ->paginate(10);
        //$pendaftaran = Pendaftaran::paginate(10);


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
     * @param  \App\Models\pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function show(pemeriksaan $pemeriksaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemeriksaan = Pemeriksaan::find($id);

        return view('dashboard.pemeriksaan.edit', ['data' => $pemeriksaan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $pemeriksaan = Pemeriksaan::find($id);

        if ($pemeriksaan == 'selesai') {
            $pemeriksaan->status = 'Y';
        } else {
            $pemeriksaan->pemeriksaan = $request->pemeriksaan;
            $pemeriksaan->tekanan_darah = $request->tekanan_darah;
            $pemeriksaan->berat_badan = $request->berat_badan;
            $pemeriksaan->tinggi_badan = $request->tinggi_badan;
            $pemeriksaan->nadi = $request->nadi;
            $pemeriksaan->suhu = $request->suhu;
            $pemeriksaan->RR = $request->RR;
            $pemeriksaan->cek_spo = $request->cek_spo;
            $pemeriksaan->diagnosa = $request->diagnosa;
            $pemeriksaan->detail_resep = $request->detail_resep;
            $pemeriksaan->obat = json_encode($request->obat);
            $pemeriksaan->jml_kunjungan = $request->jml_kunjungan;
            $pemeriksaan->terapi = $request->terapi;
            $pemeriksaan->biaya_keterangan = $request->biaya_keterangan;
            $pemeriksaan->status = 'N';
        }
        // dd($request->all());

        $pemeriksaan->save();

        return redirect('/dashboard/pemeriksaan')->with('succsess', 'Data Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pemeriksaan  $pemeriksaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemeriksaan::destroy($id);
        //$pends = Pendaftaran::destroy($id);
        return redirect()->route('pemeriksaan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function done($id)
    {
        $pemeriksaan = Pemeriksaan::find($id);
        $pemeriksaan->status = 'Y';
        $pemeriksaan->save();

        return redirect()->route('riwayat.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function pemeriksaanUmumPDF()
    {

        $data = Pemeriksaan::join('pendaftarans', 'pendaftarans.id', '=', 'pemeriksaans.pendaftaran_id')
            ->select(
                'pemeriksaans.*',
                'pendaftarans.tanggal',
                'pendaftarans.nama_pasien',
                'pendaftarans.nik',
                'pendaftarans.kepala_keluarga',
                'pendaftarans.alamat',
                'pendaftarans.keluhan'
            )
            ->where('status', 'Y')
            ->orderBy("id", 'desc')
            ->get();
        view()->share('data', $data);
        $pdf = PDF::loadView('/dashboard/pemeriksaan/pemeriksaan-pdf')->setPaper('a4', 'landscape');
        return $pdf->download('Pemeriksaan Umum.pdf');
    }
}
