<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('wardrobe_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to user
            $table->string('name');
            $table->string('category'); // e.g., Tops, Bottoms, Shoes
            $table->text('description')->nullable();
            $table->string('image')->nullable(); // Store image path
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wardrobe_items');
    }
};
