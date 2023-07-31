<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Table for storing project details and links.
 *
 * projects
 * - id
 * - name
 * - slug
 * - description
 * - github
 * - website
 * - last_active
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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            // The name of the project
            $table->string('name')
                ->comment('Name of the project');

            // URL safe and unique slug
            $table->string('slug')
                ->comment('Unique slug for the project');

            // Description of the project
            $table->text('description')
                ->nullable()
                ->comment('Description of the project');

            // GitHub URL
            $table->string('github')
                ->nullable()
                ->comment('GitHub URL');

            // Website / demo URL
            $table->string('website')
                ->nullable()
                ->comment('Website / demo URL');

            // Date of last activity
            $table->dateTime('last_active')
                ->nullable()
                ->comment('Date of last activity');

            // Is the project active on the web site
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
        Schema::dropIfExists('projects');
    }
};
