<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoxInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('box_infos', function (Blueprint $table) {
            $table->id();
            $table->string('height')->default('40')->nullable();
            $table->string('width')->default('100')->nullable();
            $table->string('color')->nullable();
            $table->integer('col_number')->nullable();
            $table->boolean('is_read')->nullable();
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
        Schema::dropIfExists('box_infos');
    }
}
