<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaanfree;
use Illuminate\Http\Request;
use PDF;

class PemeriksaanfreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pemeriksaanfree::join('bpjs', 'bpjs.id', '=', 'pemeriksaanfree.bpjs_id')
            ->select(
                'pemeriksaanfree.*',
                'bpjs.tanggal',
                'bpjs.nama_peserta',
                'bpjs.nomer_peserta',
                'bpjs.kepala_keluarga',
                'bpjs.alamat',
                'bpjs.keluhan'
            )
            ->orderBy("id", 'desc')->paginate(10);

        return view('dashboard.pemeriksaanfree.index', ['pemeriksaanfree' => $data]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemeriksaanfree  $pemeriksaanfree
     * @return \Illuminate\Http\Response
     */
    public function show(Pemeriksaanfree $pemeriksaanfree)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemeriksaanfree  $pemeriksaanfree
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemeriksaanfree = Pemeriksaanfree::find($id);

        return view('dashboard.pemeriksaanfree.edit', ['data' => $pemeriksaanfree]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemeriksaanfree  $pemeriksaanfree
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $pemeriksaanfree = Pemeriksaanfree::find($id);
        $pemeriksaanfree->pemeriksaan = $request->pemeriksaan;
        $pemeriksaanfree->tekanan_darah = $request->tekanan_darah;
        $pemeriksaanfree->berat_badan = $request->berat_badan;
        $pemeriksaanfree->tinggi_badan = $request->tinggi_badan;
        $pemeriksaanfree->nadi = $request->nadi;
        $pemeriksaanfree->suhu = $request->suhu;
        $pemeriksaanfree->RR = $request->RR;
        $pemeriksaanfree->cek_spo = $request->cek_spo;
        $pemeriksaanfree->diagnosa = $request->diagnosa;
        $pemeriksaanfree->obat = json_encode($request->obat);
        $pemeriksaanfree->detail_resep = $request->detail_resep;
        $pemeriksaanfree->jml_kunjungan = $request->jml_kunjungan;
        $pemeriksaanfree->terapi = $request->terapi;

        $pemeriksaanfree->save();
        return redirect('/dashboard/pemeriksaanfree')->with('succsess', 'Data Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemeriksaanfree  $pemeriksaanfree
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pemeriksaanfree::destroy($id);
        return redirect()->route('pemeriksaanfree.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function selesai($id)
    {
        $pemeriksaanfree = Pemeriksaanfree::find($id);
        $pemeriksaanfree->status = 'Y';
        $pemeriksaanfree->save();

        return redirect()->route('riwayatbpjs.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    public function pemeriksaanBpjsPDF()
    {

        $data = Pemeriksaanfree::join('bpjs', 'bpjs.id', '=', 'pemeriksaanfree.bpjs_id')
            ->select(
                'pemeriksaanfree.*',
                'bpjs.tanggal',
                'bpjs.nama_peserta',
                'bpjs.nomer_peserta',
                'bpjs.kepala_keluarga',
                'bpjs.alamat',
                'bpjs.keluhan'
            )
            ->where('status', 'Y')
            ->orderBy("id", 'desc')
            ->get();
        view()->share('data', $data);
        $pdf = PDF::loadView('/dashboard/pemeriksaanfree/pemeriksaanBpjs-pdf')->setPaper('a4', 'landscape');
        return $pdf->download('Pemeriksaan Bpjs.pdf');
    }
}
