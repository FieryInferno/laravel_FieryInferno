<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  public function up()
  {
    Schema::create('pasien', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->string('alamat');
      $table->string('telepon');
      $table->unsignedBigInteger('rumah_sakit_id');
      $table->foreign('rumah_sakit_id')->references('id')->on('rumah_sakit');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('pasien');
    }
};
