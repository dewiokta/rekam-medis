<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaanfree extends Model
{
    use HasFactory;
    protected $table ="pemeriksaanfree";
    protected $primarykey="id";
    protected $fillable =["id","bpjs_id","pemeriksaan","tekanan_darah","berat_badan","tinggi_badan","nadi","suhu","RR","cek_spo","obat","diagnosa","jml_kunjungan","terapi"];
    public $timestamps;

    public function bpjs() 
    { 
        return $this->hasOne('App\Models\Bpjs','id'); 
    }
}
