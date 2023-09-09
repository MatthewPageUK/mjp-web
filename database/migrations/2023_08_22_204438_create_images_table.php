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
        Schema::create('images', function (Blueprint $table) {

            $table->id();

            // The image url
            $table->string('url')
                ->comment('The image url');

            // The morph to class and id
            $table->morphs('imageable');

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
