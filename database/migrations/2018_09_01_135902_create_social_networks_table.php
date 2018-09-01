<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSocialNetworksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('social_networks', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name')->nullable();
        //     $table->text('icon')->nullable();
        //     $table->text('link')->nullable();
        //     $table->boolean('status')->defaul(1);
        //     $table->integer('user_id')->unsigned()->default(0);
        //     $table->timestamps();
        //     $table->softDeletes();
        //     $table->foreign('user_id')->references('id')->on('users');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('social_networks');
    }
}
