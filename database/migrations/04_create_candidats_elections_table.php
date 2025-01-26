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
        Schema::create('candidats_elections', function (Blueprint $table) {
            $table->id();
            $table->foreignId('candidat_id')->constrained('candidats');
            $table->foreignId('election_id')->constrained('elections');});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats_elections');
    }
};
