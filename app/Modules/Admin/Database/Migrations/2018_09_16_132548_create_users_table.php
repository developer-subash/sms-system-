<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

            $table->increments('student_id');
            $table->timestamps();
            $table->string('name');
            $table->dateTime('birthday');
            $table->enum('sex',['male','female','none','Binary','feminine']);
            $table->string('religion');
            $table->string('blood_group')->nullable();
            $table->string('permanent_address');
            $table->integer('phone')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->longText('authentication_key')->nullable();
            $table->string('current_address');
            $table->string('nationality');
            $table->string('mother_tongue')->nullable();
            $table->string('cast_category')->nullable();
            $table->string('disability')->nullable();
            $table->string('known_allergy')->nullable();
           

           
            //ClassId
            $table->integer('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('class_students')->onUpdate('cascade')->onDelete('cascade');
            // Section_id
            $table->integer('section_id')->unsigned();
            $table->foreign('section_id')->references('id')->on('sections')->onUpdate('cascade')->onDelete('cascade');
            
             // Parent Id
            //  $table->integer('parent_id')->unsigned();
            //  $table->foreign('parent_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('year');
            $table->string('roll_no');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
