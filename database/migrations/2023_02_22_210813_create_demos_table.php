<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Table for storing demo information and links.
 *
 * demos
 * - id
 * - name
 * - slug
 * - description
 * - url
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
        Schema::create('demos', function (Blueprint $table) {
            $table->id();

            // The name of the demo
            $table->string('name')
                ->comment('Name of the demo');

            // URL safe and unique slug
            $table->string('slug')
                ->comment('Unique slug for the demo');

            // Description of the demo
            $table->text('description')
                ->nullable()
                ->comment('Description of the demo');

            // URL of the demo
            $table->string('url')
                ->nullable()
                ->comment('URL of the demo');

            // Is the demo active on the web site
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
        Schema::dropIfExists('demos');
    }
};
