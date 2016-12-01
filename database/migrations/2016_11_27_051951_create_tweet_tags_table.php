<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('tweet_tags', function (Blueprint $table) {
            $table->bigInteger('tweet_id')->unsigned()->index();
            $table->integer('tag_id')->unsigned();
            $table->index(['tweet_id','tag_id']);
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
        Schema::drop('tweet_tags');
    }
}
