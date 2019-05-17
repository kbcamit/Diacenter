<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 155);
            $table->string('father_name', 155);
            $table->string('mother_name', 155);
            $table->string('email', 155)->unique();
            $table->date('dob');
            $table->string('image', 155)->nullable();
            $table->string('mobile', 30);
            $table->text('contact_address');
            $table->string('designation', 100);
            $table->date('join_date');
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
        Schema::dropIfExists('doctors');
    }
}
