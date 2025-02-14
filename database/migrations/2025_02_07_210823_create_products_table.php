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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->text('description')->nullable(true);
            $table->string('image')->nullable(false);
            $table->double('price')->nullable(false);
            $table->boolean('offer')->nullable(true);
            $table->double('new_price')->nullable(true);
            $table->boolean('status')->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->foreignId('category_id')->constrained('categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
