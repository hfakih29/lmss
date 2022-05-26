<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrow_request', function (Blueprint $table) {
            $table->bigIncrements('request_id');
            $table->string('firstname', 512);
            $table->string('lastname', 512);
            $table->string('issue_id');
            $table->integer('book_id');
            $table->string('email');
            $table->string('title');
            $table->string('callNumber');
            $table->tinyInteger('approved')->default(0);
            $table->tinyInteger('rejected')->default(0);
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
        Schema::dropIfExists('borrow_request');
    }
}
