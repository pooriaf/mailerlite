<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldSubscriberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_subscriber', function (Blueprint $table) {
            $table->increments('id');
            $table->string('value');
            $table->unsignedInteger('subscriber_id');
            $table->foreign('subscriber_id')->references('id')->on('subscribers');
            $table->unsignedInteger('field_id');
            $table->foreign('field_id')->references('id')->on('fields');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_subscriber');
    }
}
