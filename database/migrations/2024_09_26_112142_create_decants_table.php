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
        Schema::create('decants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('scent_accords')->nullable();
            $table->text('top_note')->nullable();
            $table->text('base_note')->nullable();
            $table->enum('gender', ['Male', 'Female', 'Unisex'])->nullable();
            $table->string('brand_category')->nullable();
            $table->string('country')->nullable();
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decants');
    }
};
