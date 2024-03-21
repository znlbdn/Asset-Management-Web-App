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
        Schema::create('eformpengembalian', function (Blueprint $table) {
            $table->id();
            $table->string('ret_no');
            $table->dateTime('ret_date');
            $table->string('ret_kode');
            $table->string('ret_back');
            $table->string('ret_type');
            $table->string('ret_size');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eformpengembalian');
    }
};
