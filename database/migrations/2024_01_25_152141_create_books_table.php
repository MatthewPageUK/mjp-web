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
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            $table->string('name')
                ->comment('Name / title of the book');

            $table->string('slug')
                ->comment('Unique slug for the book');

            $table->string('tagline')
                ->nullable()
                ->comment('Tagline of the book');

            $table->string('author')
                ->nullable()
                ->comment('Author(s) of the book');

            $table->string('isbn')
                ->nullable()
                ->comment('ISBN of the book');

            $table->string('publisher')
                ->nullable()
                ->comment('Publisher of the book');

            $table->date('first_published')
                ->nullable()
                ->comment('Date of first publication');

            $table->date('published')
                ->nullable()
                ->comment('Date of last publication');

            $table->smallInteger('read_count')
                ->default(0)
                ->comment('Number of times read');

            $table->text('notes')
                ->nullable()
                ->comment('Notes about the book');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
