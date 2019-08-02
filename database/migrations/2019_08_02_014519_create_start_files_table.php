<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStartFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('start_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('startsoa');
            $table->integer('startbooklet');
            $table->integer('startchv');
            $table->integer('startcv');
            $table->integer('startboxpetty');
            $table->integer('startor');
            $table->integer('startar');
            $table->integer('startpr');
            $table->unsignedInteger('user_id');
            $table->boolean('deletestatus')->default(FALSE);
            $table->integer('startpo');
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
        Schema::dropIfExists('start_files');
    }
}
