<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsArchiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('archive')->create('tags', function ($collection) {
            $collection->index('id');
            $collection->collection('groups');
            $collection->collection('posts');
            $collection->collection('dispatches');
            $collection->collection('tweets');
            $collection->collection('comments');
            $collection->collection('votes');
            $collection->collection('images');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('archive')->drop('tags');
    }
}
