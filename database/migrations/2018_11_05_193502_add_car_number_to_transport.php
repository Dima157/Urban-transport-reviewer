<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCarNumberToTransport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TransportRouteNumbers', function (Blueprint $table) {
            $table->string('carNumber');
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
            $table->dropColumn('carNumber');
        });
    }
}
