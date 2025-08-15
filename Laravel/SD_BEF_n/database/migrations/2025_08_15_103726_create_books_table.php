<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    //  Run migrations
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->decimal('estimated_price', 10, 2); 
            $table->decimal('paid_price', 10, 2)->nullable(); 
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); 
            $table->timestamps();
        });
    }

    // Reverse migrations
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
