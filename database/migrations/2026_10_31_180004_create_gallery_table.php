<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('gallery')) {
            Schema::create('gallery', function (Blueprint $table) {
                $table->id();
                $table->string('gallery_slug')->nullable();
                $table->string('title')->nullable();
                $table->string('category')->nullable();
                $table->string('category_name')->nullable();
                $table->text('image')->nullable();
                $table->text('desc')->nullable();
                $table->string('tech')->nullable();
                $table->string('icon')->nullable();
                $table->integer('order_num')->default(0);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery');
    }
};
