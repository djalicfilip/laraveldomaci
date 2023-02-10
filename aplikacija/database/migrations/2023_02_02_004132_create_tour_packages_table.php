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
        Schema::create('tour_packages', function (Blueprint $table) {
            $table->id('package_id');
            $table->string('name');
            $table->string('transport');
            $table->string('destination');
            $table->string('description');
            $table->string('date_from');
            $table->string('date_to');
            $table->double('price',5,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_packages');
    }
};
