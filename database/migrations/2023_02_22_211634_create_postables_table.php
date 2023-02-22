<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Polymorphic relationship for posts.
 *
 * Projects and Demos can have posts attached to them.
 * Note - Skills are attached via the Skillables table.
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('postables', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->morphs('postable');
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
