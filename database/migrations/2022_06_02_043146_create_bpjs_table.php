<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBpjsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpjs', function (Blueprint $table) {
            $table->id();
            $table->string('tanggal');
            $table->string('nama_peserta',100);
            $table->string('kepala_keluarga',100);
            $table->string('nomer_peserta',16);
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->string('alamat',100);
            $table->string('nomer_telepon',16);
            $table->string('keluhan');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bpjs');
    }
}
