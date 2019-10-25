<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleRatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_rating', function (Blueprint $table) {
            $table->unsignedBigInteger('article_id')->index();
            $table->foreign('article_id')->references('id')->on('articles')
                ->onDelete('cascade');

            $table->unsignedInteger('rating_id')->index();
            $table->foreign('rating_id')->references('id')->on('ratings')
                ->onDelete('cascade');

            $table->unsignedBigInteger('user_id');

            $table->primary(['article_id', 'rating_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_rating');
    }
}
