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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('date')->nullable();
            $table->string('apartment')->nullable();
            $table->string('area')->nullable();
            $table->string('society')->nullable();
            $table->string('block')->nullable();
            $table->string('floor')->nullable();
            $table->string('flat_no')->nullable();
            $table->string('bathroom')->nullable();
            $table->string('balcony')->nullable();
            $table->string('lift')->nullable();
            $table->string('parking')->nullable();
            $table->string('apartment_type')->nullable();
            $table->string('budget')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('notification')->default(0);
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
        Schema::dropIfExists('sellers');
    }
};
