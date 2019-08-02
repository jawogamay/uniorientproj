<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAirlineRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airline_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->date('day')->nullable();
            $table->double('rate');
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
        Schema::dropIfExists('airline_rates');
    }
}
