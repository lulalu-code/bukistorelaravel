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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('author_name');
            $table->string('category');
            $table->decimal('height', 8, 2);
            $table->decimal('width', 8, 2);
            $table->decimal('length', 8, 2);
            $table->boolean('is_customable');
            $table->string('imageURL');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });

        Schema::table('product', function (Blueprint $table) {

            $table->foreign('author_name')->references('name')->on('user')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
