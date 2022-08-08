<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pendaftaran;
use App\Models\Pemeriksaan;
use App\Models\Bpjs;
use App\Models\Pemeriksaanfree;
use Session;


class DashboardController extends Controller
{
   public function index(){
      $pendaftaran = Pendaftaran::count();
      $bpjs = Bpjs::count();
      $pemeriksaan = Pemeriksaan::count();
      $pemeriksaanfree = Pemeriksaanfree::count();
      return view('dashboard.dashboard',compact('bpjs','pendaftaran','pemeriksaan','pemeriksaanfree'));
   }
}
