<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Table for storing basic settings and values such as contact
 * details and social media links.
 *
 * settings
 * - id
 * - key
 * - value
 * - created_at
 * - updated_at
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();

            // The setting key
            $table->string('key')
                ->unique()
                ->comment('Setting key');

            // The setting value
            $table->string('value')
                ->nullable()
                ->comment('Setting value');

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
