<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->increments('id_inc');
            $table->bigInteger('id')->unsigned()->nullable();
            $table->text('json');
            $table->string('tweet_text')->nullable();
            $table->integer('retweet_count')->nullable();
            $table->string('user_id')->nullable();
            $table->longText('user')->nullable();
            $table->string('user_screen_name')->nullable();
            $table->string('user_avatar_url')->nullable();
            $table->boolean('is_retweeted')->default(0)->nullable();
            $table->timestamps();
            $table->index('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tweets');
    }
}
