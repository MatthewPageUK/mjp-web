<?php

use App\Models\Book;
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
        Schema::create('readings', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Book::class)
                ->comment('Foreign key to the book being read');

            $table->string('chapter')
                ->nullable()
                ->comment('Chapter of the book being read');

            $table->string('pages')
                ->nullable()
                ->comment('Pages of the book being read');

            $table->smallInteger('minutes')
                ->nullable()
                ->comment('Duration of the reading session in minutes');

            $table->text('notes')
                ->nullable()
                ->comment('Notes about the reading session');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readings');
    }
};
