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
        Schema::create('donate_lists', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->integer('price');
            $table->string('description', 255);
            $table->string('photo', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donate_lists');
    }
};
