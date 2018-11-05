<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCityToTransport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TransportRouteNumbers', function (Blueprint $table) {
            $table->integer('city_id')->unsigned();
            $table->index('city_id');
            $table->foreign('city_id')->references('id')->on('City');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TransportRouteNumbers', function (Blueprint $table) {
            //
        });
    }
}
