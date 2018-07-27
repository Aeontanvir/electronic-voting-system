<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nid')->unique();
            $table->string('name');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('occupation');
            $table->string('gender');
            $table->string('blood');
            $table->string('religion');
            $table->date('date_of_birth');
            $table->string('birth_place');
            $table->longText('address');
            $table->string('profile_photo');
            $table->string('finger_print');

            $table->integer('area_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas');

            $table->integer('zone_id')->unsigned();
            $table->foreign('zone_id')->references('id')->on('zones');

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
        Schema::dropIfExists('voters');
    }
}
