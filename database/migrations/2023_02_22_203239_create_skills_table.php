<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Table for storing information about skills and level of
 * achievement.
 *
 * skills
 * - id
 * - name
 * - slug
 * - description
 * - level
 * - svg
 * - active
 * - created_at
 * - updated_at
 * - deleted_at
 *
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();

            // The name of the skill
            $table->string('name')
                ->comment('Name of the skill');

            /**
             * URL safe and unique slug, due to using softdeletes
             * this is not specified as unique in this migration.
             */
            $table->string('slug')
                ->comment('Unique slug for the skill');

            // Optional / nullable text description of the skill
            $table->text('description')
                ->nullable()
                ->comment('Description of the skill');

            // Level of skill obtained, 1 - 10
            $table->unsignedTinyInteger('level')
                ->default(5)
                ->comment('Level of skill obtained (0-10)');

            // SVG image for the skill
            $table->text('svg')
                ->nullable()
                ->comment('SVG image for the skill');

            // Is the skill active on the web site
            $table->boolean('active')
                ->default(true)
                ->comment('Active on the web site');

            // Indexes
            $table->index('slug');
            $table->index('level');
            $table->index('active');

            // Enable soft delete column
            $table->softDeletes();

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
