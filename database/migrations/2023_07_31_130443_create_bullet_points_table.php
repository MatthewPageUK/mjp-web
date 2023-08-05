<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bullet_points', function (Blueprint $table) {
            $table->id();

            // Name of the bullet point
            $table->string('name')
                ->comment('Name of the bullet point');

            // Sort order
            $table->unsignedTinyInteger('order')
                ->default(0)
                ->comment('Sort order');

            // Indexes
            $table->index('name');

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
        Schema::dropIfExists('bullet_points');
    }
};
