<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaanfreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaanfree', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bpjs_id');
            $table->string('pemeriksaan',100);
            $table->string('diagnosa',100);
            $table->integer('jml_kunjungan');
            $table->string('terapi',100);
            $table->string('status')->default('N');
            $table->timestamps();

            $table->foreign('bpjs_id')->references('id')->on('bpjs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaanfree');
    }
}
