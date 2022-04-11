<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

  public function up()
  {
    Schema::create('rumah_sakit', function (Blueprint $table) {
      $table->id();
      $table->string('nama');
      $table->string('alamat');
      $table->string('email');
      $table->string('telepon');
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('rumah_sakit');
    }
};
