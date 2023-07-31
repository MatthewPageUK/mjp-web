<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Table for storing blog post categories.
 *
 * post_categories
 * - id
 * - name
 * - slug
 * - description
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
        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();

            // Name of the category
            $table->string('name')
                ->comment('Name of the category');

            // URL safe and unique slug
            $table->string('slug')
                ->comment('Unique slug for the category');

            // Description of the category
            $table->text('description')
                ->nullable()
                ->comment('Description of the category');

            // Indexes
            $table->index('slug');

            // Enable soft deletes
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
        Schema::dropIfExists('post_categories');
    }
};
