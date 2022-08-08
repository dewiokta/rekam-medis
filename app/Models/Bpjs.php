<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bpjs extends Model
{
    use HasFactory;
    protected $table ="bpjs";
    protected $primaryKey = "id";
    protected $fillable =["tanggal","nama_peserta","kepala_keluarga","nomer_peserta","tanggal_lahir","agama","alamat","nomer_telepon","keluhan"];
    public $timestamps;

    public function pemeriksaanfree()
    {
        return $this->belongsTo('App\Models\Pemeriksaanfree');
    }

}
