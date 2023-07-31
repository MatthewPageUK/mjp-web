<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Table for storing work and relevant experience.
 *
 * experiences
 * - id
 * - start
 * - end
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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();

            // Date started
            $table->date('start')
                ->comment('Date started');

            // Date finished, or null if still active
            $table->date('end')
                ->nullable()
                ->comment('Date finished');

            // The name of the experience
            $table->string('name')
                ->comment('Name of the experience');

            // URL safe and unique slug
            $table->string('slug')
                ->comment('Unique slug for the experience');

            // Description of the experience
            $table->text('description')
                ->nullable()
                ->comment('Description of the experience');

            // Is the experience active on the web site
            $table->boolean('active')
                ->default(true)
                ->comment('Active on the web site');

            // Indexes
            $table->index('slug');
            $table->index('active');
            $table->index(['start', 'end']);

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
        Schema::dropIfExists('experiences');
    }
};
