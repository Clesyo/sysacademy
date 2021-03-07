<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAndressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('andresses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('zip_code');
            $table->string('andress');
            $table->string('complement')->nullable();
            $table->string('zone');
            $table->string('locality');
            $table->string('disdrict');
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
        Schema::dropIfExists('andresses');
    }
}
