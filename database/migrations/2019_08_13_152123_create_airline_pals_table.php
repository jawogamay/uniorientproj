<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlinePalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_pals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reference');
            $table->integer('sanumber');
            $table->string('route');
            $table->string('soa');
            $table->string('tis');
            $table->double('php');
            $table->double('usd');
            $table->unsignedInteger('user_id');
             $table->boolean('deletestatus')->default(FALSE);
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
        Schema::dropIfExists('airline_pals');
    }
}
