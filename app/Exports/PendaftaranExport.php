<?php

namespace App\Exports;

use App\Models\Pendaftaran;
use App\Models\Pemeriksaan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;

class PendaftaranExport implements FromCollection, WithCustomCsvSettings, WithHeadings
{
    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ["Tanggal", "Nama Pasien","Kepala Keluarga","Nomer Identitas","Tanggal Lahir"
        ,"Agama","Alamat","Nomer Telepon","Keluhan"];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pendaftaran::Select('tanggal','nama_pasien','kepala_keluarga','nik','tanggal_lahir','agama','alamat','nomer_telepon','keluhan')->get();
    }
}
