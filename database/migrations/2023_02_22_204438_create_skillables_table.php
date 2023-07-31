<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Polymorphic relationship for skills.
 *
 * Projects, Demos and Posts can have skills attached to them
 * via this pivot table.
 *
 * skillables
 * - skill_id
 * - skillable_id
 * - skillable_type
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
        Schema::create('skillables', function (Blueprint $table) {

            // The skill ID
            $table->unsignedBigInteger('skill_id');

            // The morph to class and id
            $table->morphs('skillable');

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skillables');
    }
};
