<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotoReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photo_reviews', function (Blueprint $t) {
            $t->increments('id');

            $t->integer('reviews_id')->unsigned();
            $t->index('reviews_id');
            $t->foreign('reviews_id')->references('id')->on('Reviews');

            $t->integer('photo_id')->unsigned();
            $t->index('photo_id');
            $t->foreign('photo_id')->references('id')->on('photo');

            $t->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_reviews');
    }
}
