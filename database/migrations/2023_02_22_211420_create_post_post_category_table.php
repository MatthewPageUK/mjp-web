<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Pivot table for Posts -> Categories.
 *
 * post_post_category
 * - id
 * - post_id
 * - post_category_id
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
        Schema::create('post_post_category', function (Blueprint $table) {
            $table->id();

            // The post ID
            $table->foreignId('post_id')
                ->nullable()
                ->constrained('posts')
                ->nullOnDelete();

            // The post category ID
            $table->foreignId('post_category_id')
                ->nullable()
                ->constrained('post_categories')
                ->nullOnDelete();

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_post_category');
    }
};
