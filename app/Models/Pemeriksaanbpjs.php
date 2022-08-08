<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaanbpjs extends Model
{
    use HasFactory;
    protected $table ="pemeriksaanbpjs";
    protected $primarykey="id";
    protected $fillable =["id","bpjs_id","pemeriksaan","diagnosa","jml_kunjungan","terapi"];
    public $timestamps;

    public function bpjs() 
    { 
        return $this->hasOne('App\Models\Bpjs','id'); 
    }
}
