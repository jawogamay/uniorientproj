<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_summaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('salesagreement');
            $table->string('soa');#statement of account;
           /* $table->unsignedInteger('customer_id');
            $table->unsignedInteger('passenger_id');*/
            $table->unsignedInteger('customer_id');
            $table->string('passenger_name');
            $table->unsignedInteger('user_id');
            $table->string('verified');
            $table->boolean('status')->default(0);
             $table->boolean('deletestatus')->default(FALSE);
            $table->string('payment');
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
        Schema::dropIfExists('sales_summaries');
    }
}
