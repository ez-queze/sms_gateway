<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggarans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nis')->index();
            $table->foreign('nis')->references('nis')->on('siswas')->onDelete('cascade');
            $table->string('nama_siswa');
            $table->integer('total_poin');
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
        Schema::dropIfExists('pelanggarans');
    }
}
