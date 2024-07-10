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
            $table->string('name');
            $table->date('date');
            $table->foreignId('author_id')->constrained('authors');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
