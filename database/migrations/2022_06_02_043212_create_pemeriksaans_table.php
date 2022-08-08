<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pendaftaran_id');
            $table->string('pemeriksaan',100);
            $table->string('diagnosa',100);
            $table->integer('jml_kunjungan');
            $table->string('terapi',100);
            $table->string('biaya_keterangan',100);
            $table->string('status')->default('N');
            $table->timestamps();

            $table->foreign('pendaftaran_id')->references('id')->on('pendaftarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaans');
    }
}
