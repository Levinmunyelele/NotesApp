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
            Schema::create('notes', function (Blueprint $table) {
                $table->id(); // Auto-incrementing primary key
                // Foreign key to link notes to users. If a user is deleted, their notes are also deleted.
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
                $table->string('title'); // Title of the note
                $table->text('content'); // Content of the note
                $table->timestamps(); // Adds `created_at` and `updated_at` columns
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
