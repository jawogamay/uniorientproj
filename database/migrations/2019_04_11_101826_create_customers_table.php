<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('account_name');
            $table->string('address');
            $table->string('nature');
            $table->string('company');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->unsignedInteger('user_id');
            $table->string('term');
            $table->string('sss');
            $table->string('secreg');
            $table->string('tin');
            $table->string('contact')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
