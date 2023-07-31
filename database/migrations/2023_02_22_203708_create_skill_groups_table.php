<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Table for storing information about skill groups.
 *
 * skill_groups
 * - id
 * - name
 * - slug
 * - description
 * - active
 * - created_at
 * - updated_at
 * - deleted_at
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('skill_groups', function (Blueprint $table) {
            $table->id();

            // The name of the skill group
            $table->string('name')
                ->comment('Name of the skill group');

            /**
             * URL safe and unique slug, due to using softdeletes
             * this is not specified as unique in this migration.
             */
            $table->string('slug')
                ->comment('Unique slug for the skill group');

            // Optional / nullable text description of the skill
            $table->text('description')
                ->nullable()
                ->comment('Description of the skill group');

            // Is the skill group active on the web site
            $table->boolean('active')
                ->default(true)
                ->comment('Active on the web site');

            // Indexes
            $table->index('slug');
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
        Schema::dropIfExists('skill_groups');
    }
};
