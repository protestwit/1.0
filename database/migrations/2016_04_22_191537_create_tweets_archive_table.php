<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsArchiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('archive')->create('tweets', function ($collection) {
            $collection->index('id_inc');            
            $collection->unique('id');
            $collection->collection('tags');
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
        Schema::connection('archive')->drop('tweets');
    }
}
