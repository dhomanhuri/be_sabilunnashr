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
        Schema::create('ramadhans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('wa');
            $table->string('email');
            $table->string('domicile');
            $table->string('job');
            $table->string('age');
            $table->string('gender');
            $table->string('upload_file');
            $table->string('reason');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ramadhans');
    }
};
