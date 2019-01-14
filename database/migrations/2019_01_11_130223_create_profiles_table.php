<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            // Add Table specific columns
            $table->string('first_name');
            $table->string('last_name');
            $table->string('gender', 6);
            $table->date('date_of_birth');
            $table->date('date_of_death')->nullable($value = true);
            $table->string('location', 100)->nullable($value = true);

            // Relationship
            $table->unsignedInteger('father_id')->nullable($value = true);
            $table->foreign('father_id')->references('id')->on('profiles');
            $table->unsignedInteger('mother_id')->nullable($value = true);
            $table->foreign('mother_id')->references('id')->on('profiles');

            // Add Foreign key
            $table->unsignedInteger('user_id')->nullable($value = true);
            $table->foreign('user_id')->references('id')->on('users');

            // Add Laravel timestamps
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
        Schema::dropIfExists('profiles');
    }
}
