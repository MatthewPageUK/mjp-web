<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Skill -> Skill Group Pivot Table.
 *
 * skill_skill_group
 * - id
 * - skill_id
 * - skill_group_id
 * - created_at
 * - updated_at
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

            // The skill ID
            $table->foreignId('skill_id')
                ->constrained('skills')
                ->comment('The skill ID');

            // The skill group ID
            $table->foreignId('skill_group_id')
                ->constrained('skill_groups')
                ->comment('The skill group ID');

            // Created and updated timestamps
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
