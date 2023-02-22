<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Many to Many relationship between skills and skill groups.
 *
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skill_skill_group', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_id')->nullable()->constrained('skills')->nullOnDelete();
            $table->foreignId('skill_group_id')->nullable()->constrained('skill_groups')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_skill_group');
    }
};
