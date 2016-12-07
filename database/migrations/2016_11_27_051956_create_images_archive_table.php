<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesArchiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('archive')->create('images', function ($collection) {
            $collection->index('id');
            $collection->collection('tags');
            $collection->collection('groups');
            $collection->collection('posts');
            $collection->collection('dispatches');
            $collection->collection('tweets');
            $collection->collection('comments');
            $collection->collection('votes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('archive')->drop('images');
    }
}
