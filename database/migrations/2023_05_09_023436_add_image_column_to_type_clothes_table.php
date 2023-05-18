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
        Schema::table('type_clothes', function (Blueprint $table) {
            $table->string('image', 100)->nullable()->after('number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('type_clothes', function (Blueprint $table) {
            if (Schema::hasColumn('types','image')){
                $table->dropColumn('image');
            }
        });
    }
};
