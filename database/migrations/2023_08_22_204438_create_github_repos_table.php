<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Polymorphic relationship for images.
 *
 * Projects, Demos and Posts can have an image attached to them
 * via this pivot table.
 *
 * images
 * - id
 * - url
 * - imageable_id
 * - imageable_type
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
        Schema::create('github_repos', function (Blueprint $table) {

            $table->id();

            // The repo url
            $table->string('url')
                ->comment('The repo url');

            $table->string('owner')
                ->comment('The repo owner');

            $table->string('name')
                ->comment('The repo name');

            // The morph to class and id
            $table->morphs('githubable');

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('github_repos');
    }
};
