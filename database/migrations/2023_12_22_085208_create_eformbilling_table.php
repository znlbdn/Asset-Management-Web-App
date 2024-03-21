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
        Schema::create('eformbilling', function (Blueprint $table) {
            $table->id();
            $table->string('bil_no');
            $table->dateTime('bil_date');
            $table->string('bil_code');
            $table->string('bil_vendor');
            $table->string('bil_type');
            $table->string('bil_size');
            $table->string('bil_brand');
            $table->integer('bil_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eformbilling');
    }
};
