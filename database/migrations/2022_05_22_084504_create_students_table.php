<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('member_id');
            $table->string('firstname', 512);
            $table->string('lastname', 512);
            $table->string('email')->unique();
            $table->tinyInteger('approved')->default(0);
            $table->tinyInteger('rejected')->default(0);
            $table->boolean('has_credit_card')->nullable();
            $table->tinyInteger('books_issued')->default(0);
            
            
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
        Schema::dropIfExists('students');
    }
}
