<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Messages
 *
 */
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {

            $table->id();

            $table->string('first_name')
                ->comment('First name of the message sender');

            $table->string('surname')
                ->nullable()
                ->comment('Surname of the message sender');

            $table->string('company')
                ->nullable()
                ->comment('Company of the message sender');

            $table->string('telephone')
                ->nullable()
                ->comment('Telephone of the message sender');

            $table->string('email')
                ->comment('Email address of the message sender');

            $table->text('message')
                ->comment('The message sent by the sender');

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
