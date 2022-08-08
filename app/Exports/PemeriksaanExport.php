<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use App\Models\Pemeriksaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;

class PemeriksaanExport implements FromCollection, WithCustomCsvSettings, WithHeadings
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
        ,"Keluhan","Pemeriksaan","Diagnosa","Jumlah Kunjungan","Terapi","Biaya dan Keterangan"];
    }
    
    public function collection()
    {
        return Pemeriksaan::join('pendaftarans','pendaftarans.id','=','pemeriksaans.pendaftaran_id')
                ->select('pendaftarans.tanggal','pendaftarans.nama_pasien','pendaftarans.nik'
                        ,'pendaftarans.kepala_keluarga','pendaftarans.alamat','pendaftarans.keluhan','pemeriksaans.pemeriksaan'
                        ,'pemeriksaans.diagnosa','pemeriksaans.jml_kunjungan','pemeriksaans.terapi','pemeriksaans.biaya_keterangan')
                ->get();
    }
}
