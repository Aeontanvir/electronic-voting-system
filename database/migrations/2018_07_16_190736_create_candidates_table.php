<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nid');
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('occupation');
            $table->date('date_of_birth');
            $table->string('profile_photo');

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');

            $table->integer('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones');

            $table->integer('party_id')->unsigned();
            $table->foreign('party_id')->references('id')->on('parties');

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
        Schema::dropIfExists('candidates');
    }
}
