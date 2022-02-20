<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihs', function (Blueprint $table) {
            $table->id();
            $table->integer('ting_id');
            $table->integer('user_id');
            $table->string('plth_id');
            $table->string('nik');
            $table->string('jns_klmin');
            $table->string('email');
            $table->string('foto');
            $table->string('nama');
            $table->string('alamat');
            $table->string('tmpt');
            $table->string('tgl');
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
        Schema::dropIfExists('pelatihs');
    }
}