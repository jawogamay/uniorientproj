<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoaSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soa_series', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('soaNumber')->unique();
            $table->unsignedInteger('user_id');
            /*$table->unsignedInteger('soaseries_id');*/
            $table->boolean('is_used')->default(FALSE);
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
        Schema::dropIfExists('soa_series');
    }
}
