<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarrierToTransport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TransportRouteNumbers', function (Blueprint $table) {
            $table->integer('carrier_id')->unsigned();
            $table->index('carrier_id');
            $table->foreign('carrier_id')->references('id')->on('Carrier');
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
            $table->dropForeign('carrier_id');
            $table->dropIndex('carrier_id');
            $table->dropColumn('carrier_id');
        });
    }
}
