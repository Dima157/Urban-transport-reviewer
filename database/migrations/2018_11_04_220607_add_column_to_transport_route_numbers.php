<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToTransportRouteNumbers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TransportRouteNumbers', function (Blueprint $table) {
            $table->integer('type_id')->unsigned();
            $table->index('type_id');
            $table->foreign('type_id')->references('id')->on('TransportsType')->onDelete('cascade');
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
            $table->dropForeign('type_id');
            $table->dropColumn('type_id');
        });
    }
}
