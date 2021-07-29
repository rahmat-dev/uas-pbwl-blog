<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlbumsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('albums', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('photo_id');
      $table->string('name', 100);
      $table->string('text', 100);
      $table->timestamps();

      $table->foreign('photo_id')->references('id')->on('photos');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('albums');
  }
}
