<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Skill journeys
 *
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skill_journeys', function (Blueprint $table) {

            $table->id();

            $table->string('name')
                ->comment('The name of the skill journey item');

            $table->date('completed_at')
                ->nullable()
                ->comment('The date the skill journey item was completed');

            $table->foreignId('skill_id')
                ->comment('The skill this journey item belongs to');

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skill_journeys');
    }
};
