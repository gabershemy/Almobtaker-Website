<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('services')) {
            Schema::create('services', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('tag')->nullable();
                $table->string('icon')->nullable();
                $table->string('color_class')->nullable();
                $table->text('short_desc')->nullable();
                $table->text('desc')->nullable();
                $table->text('image')->nullable();
                $table->text('points')->nullable();
                $table->string('tech')->nullable();
                $table->integer('order_num')->default(0);
                $table->string('service_slug')->nullable();
                $table->string('seo_title')->nullable();
                $table->text('seo_desc')->nullable();
                $table->text('seo_keywords')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
