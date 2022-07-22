<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadEmailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lead_email', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->default('');
            $table->integer('lead_id')->unsigned();
            $table->timestamps();

            $table->foreign('lead_id')->references('id')->on('lead');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lead_email');
    }
}
