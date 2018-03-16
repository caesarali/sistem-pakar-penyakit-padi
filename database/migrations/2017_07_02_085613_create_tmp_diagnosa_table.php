<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTmpDiagnosaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tmp_diagnosa', function (Blueprint $table) {
            $table->unsignedInteger('pasien_id')->nullable();
            $table->unsignedInteger('penyakit_id')->nullable();
            $table->unsignedInteger('gejala')->nullable();
            $table->unsignedInteger('gejala_terpenuhi')->nullable();
            $table->unsignedInteger('persen')->nullable();

            $table->foreign('pasien_id')->references('id')->on('pasien')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('penyakit_id')->references('id')->on('penyakit')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tmp_diagnosa');
    }
}
