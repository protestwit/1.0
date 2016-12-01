<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('twitter_id')->nullable();
            $table->string('name')->nullable();
            $table->string('screen_name')->nullable();
            $table->string('handle')->nullable()->unique();
            $table->string('avatar')->nullable();
            $table->string('location')->nullable();
            $table->string('profile_location')->nullable();
            $table->string('description')->nullable();
            $table->string('url')->nullable();
            $table->string('follower_count')->nullable();
            $table->string('friends_count')->nullable();
            $table->string('listed_count')->nullable();
            $table->string('favourites_count')->nullable();
            $table->string('utc_offset')->nullable();
            $table->string('time_zone')->nullable();
            $table->string('geo_enabled')->nullable();
            $table->string('statuses_count')->nullable();
            $table->string('lang')->nullable();
            $table->string('token')->nullable();
            $table->string('token_secret')->nullable();
            $table->boolean('is_following')->nullable()->default(0);
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
