<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $table ="pendaftarans";
    protected $primaryKey = "id";
    protected $fillable =["tanggal","nama_pasien","kepala_keluarga","nik","tanggal_lahir","agama","alamat","nomer_telepon","keluhan"];
    public $timestamps;

    public function pemeriksaan()
    {
        return $this->belongsTo('App\Models\Pendaftaran');
    }
}
