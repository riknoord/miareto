<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {

    public function up()
    {
        Schema::create("userprofiles",function(blueprint $table){

            $table->increments('id');
            $table->integer('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('street');
            $table->string('streetnr');
            $table->string('postalcode');
            $table->string('city');
            $table->string('country');
            $table->string('gender',10);
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
        Schema::drop("userprofiles");
    }

}
