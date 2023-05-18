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
        Schema::create('type_clothes', function (Blueprint $table) {
            $table->id('number');
            $table->string('name_clothes', 100)->default('text');
            $table->string('type_clothes', 100)->default('text');
            $table->string('price', 50);
            $table->unsignedBigInteger('seller');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('seller')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_clothes');
    }
};
