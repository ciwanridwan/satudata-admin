<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoGrapiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_grapiks', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->foreignId('kategori_info_id')->references('kategori_infos')->on('id');
            $table->foreignId('province_id')->references('provinces')->on('id');
            $table->foreignId('city_id')->references('cities')->on('id');
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
        Schema::dropIfExists('info_grapiks');
    }
}
