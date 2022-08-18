<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');//connect user table with book table where one user have many book but book belong one user 
            $table->string('name_book');
            $table->string('auther_name');
            $table->integer('number_of_pages');
            $table->integer('number_of_aviable_book');
            $table->string('place_of_publication');
            $table->double('rent_price');
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
        Schema::dropIfExists('books');
    }
};
