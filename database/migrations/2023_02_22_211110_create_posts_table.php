<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Table for storing blog posts.
 *
 * posts
 * - id
 * - name
 * - slug
 * - snippet
 * - content
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Title of the post
            $table->string('name')
                ->comment('Title of the post');

            // URL safe slug
            $table->string('slug')
                ->comment('URL safe slug for the post');

            // Short snippet of the post
            $table->string('snippet')
                ->nullable()
                ->comment('Short snippet of the post');

            // Content of the post
            $table->text('content')
                ->comment('Content of the post');

            // Is the post active on the web site
            $table->boolean('active')
                ->default(true)
                ->comment('Active on the web site');

            // Indexes
            $table->index('slug');
            $table->index('active');

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
        Schema::dropIfExists('posts');
    }
};
