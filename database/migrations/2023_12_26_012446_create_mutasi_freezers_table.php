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
        Schema::create('mutasi_freezer', function (Blueprint $table) {
            $table->id();
            $table->date('mutation_date');
            $table->string('mutation_ori');
            $table->string('mutation_to');
            $table->string('code_freezer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mutasi_freezer');
    }
};
