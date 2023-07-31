<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Polymorphic relationship for posts.
 *
 * Projects and Demos can have posts attached to them.
 * Note - Skills are attached via the Skillables table.
 *
 * postables
 * - post_id
 * - postable_id
 * - postable_type
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
        Schema::create('postables', function (Blueprint $table) {

            // The post ID
            $table->unsignedBigInteger('post_id');

            // The morph to class and id
            $table->morphs('postable');

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('postables');
    }
};
