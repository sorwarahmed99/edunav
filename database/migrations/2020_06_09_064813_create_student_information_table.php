<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_information', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('urn')->nullable();
            $table->string('fullname');
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('profile_image')->nullable();
            $table->boolean('is_ielts')->default(0)->nullable();
            $table->string('test_name')->nullable();
            $table->string('ielts_score')->nullable();
            $table->string('ielts_validity')->nullable();
            $table->string('intended_course')->nullable(); 
            $table->string('intended_university')->nullable();
            $table->string('others')->nullable(); 
            $table->boolean('status')->default(0)->nullable();          
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
        Schema::dropIfExists('student_information');
    }
}
