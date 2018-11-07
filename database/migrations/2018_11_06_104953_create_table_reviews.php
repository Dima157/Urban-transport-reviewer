<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReviews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Reviews', function (Blueprint $t){
           $t->increments('id');

           $t->integer('user_id')->unsigned();
           $t->index('user_id');
           $t->foreign('user_id')->references('id')->on('users');

            $t->integer('city_id')->unsigned();
            $t->index('city_id');
            $t->foreign('city_id')->references('id')->on('City');

            $t->integer('problem_id')->unsigned();
            $t->index('problem_id');
            $t->foreign('problem_id')->references('id')->on('TransportProblems');

            $t->integer('transport_id')->unsigned();
            $t->index('transport_id');
            $t->foreign('transport_id')->references('id')->on('TransportRouteNumbers');

            $t->timestamp('dateReview');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
