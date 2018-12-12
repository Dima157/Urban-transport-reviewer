<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Reviews', function (Blueprint $t) {
            $t->float('lat');
            $t->float('lng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Reviews', function (Blueprint $t) {
            $t->dropColumn('lat');
            $t->dropColumn('lng');
        });
    }
}
