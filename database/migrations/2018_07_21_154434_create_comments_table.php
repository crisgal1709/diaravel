<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comment_id')->unsigned()->default(0);
            $table->integer('post_id')->unsigned()->default(0);
            $table->text('body')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->boolean('approved')->default(0);
            $table->timestamps();
            $table->softDeletes();
            // $table->foreign('comment_id')->references('id')->on('comments');
            // $table->foreign('post_id')->references('id')->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
