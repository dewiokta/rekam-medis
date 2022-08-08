<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemeriksaanObat extends Model
{
    use HasFactory;
    protected $fillable =["id_obats", "id_pemeriksaans"];

    public function obats() 
    { 
        return $this->belongsTo(Obat::class, 'id'); 
    }

    public function pemeriksaans(){
        return $this->belongsTo(Pemeriksaan::class, "id");
    }
    
}
