<?php

namespace App\Exports;

use App\Models\Bpjs;
use App\Models\Pemeriksaanfree;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;

class PemeriksaanBpjsExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ["Tanggal", "Nama Pasien","Nomer Identitas","Kepal Keluarga","Alamat"
        ,"Keluhan","Pemeriksaanfree","Diagnosa","Jumlah Kunjungan","Terapi","Biaya dan Keterangan"];
    }
    
    public function collection()
    {
        return Pemeriksaanfree::join('bpjs','bpjs.id','=','pemeriksaanfree.bpjs_id')
                ->select('bpjs.tanggal','bpjs.nama_peserta','bpjs.nomer_peserta'
                        ,'bpjs.kepala_keluarga','bpjs.alamat','bpjs.keluhan','pemeriksaanfree.pemeriksaan'
                        ,'pemeriksaanfree.diagnosa','pemeriksaanfree.jml_kunjungan','pemeriksaanfree.terapi')
                ->get();
    }
}
