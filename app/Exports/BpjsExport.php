<?php

namespace App\Exports;

use App\Models\Bpjs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Excel;

class BpjsExport implements FromCollection, WithCustomCsvSettings, WithHeadings
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
        return Bpjs::Select('tanggal','nama_peserta','kepala_keluarga','nomer_peserta','tanggal_lahir','agama','alamat','nomer_telepon','keluhan')->get();
    }
}
