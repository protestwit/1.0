<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->string('slug')->unique()->nullable();
            $table->string('name')->nullable();
            $table->string('public_tag')->nullable();
            $table->string('private_tag')->nullable();
            $table->string('access_password')->nullable();
            $table->boolean('allow_public_subgroups')->default(0);
            $table->boolean('is_public')->default(0);
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
        Schema::drop('groups');
    }
}
