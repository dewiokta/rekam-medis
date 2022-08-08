<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $fillable =["id","nama","harga"];

    // public function pemeriksaan_obats() 
    // { 
    //     return $this->hasMany(PemeriksaanObat::class, 'id_obats'); 
    // }

    // public function pemeriksaanfree_obats() 
    // { 
    //     return $this->hasMany(PemeriksaanFreeObat::class, 'id_obats'); 
    // }
}

