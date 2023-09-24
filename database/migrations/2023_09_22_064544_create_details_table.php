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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detailable_id');
            $table->string('detailable_type');
            $table->string('isbn');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('publisher');
            $table->string('author');
            $table->string('language')->nullable();
            $table->unsignedBigInteger('stock')->default(0);
            $table->date('published_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
