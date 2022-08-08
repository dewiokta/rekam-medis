<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;
    protected $table ="pemeriksaans";
    protected $primarykey="id";
    protected $fillable =["id","pendaftaran_id","pemeriksaan","diagnosa","tekanan_darah","berat_badan","tinggi_badan","nadi","suhu","RR","cek_spo","obat","jml_kunjungan","terapi","biaya_keterangan"];
    public $timestamps;

    public function pendaftaran() 
    { 
        return $this->hasOne('App\Models\Pendaftaran','id'); 
    }
}
