<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('eformpermintaan', function (Blueprint $table) {
            $table->id();
            $table->string('req_no');
            $table->dateTime('req_date');
            $table->string('req_name');
            $table->string('req_hp');
            $table->string('req_vendor');
            $table->string('req_type');
            $table->string('req_size');
            $table->integer('req_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eformpermintaan');
    }
};
