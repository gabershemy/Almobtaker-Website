<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('projects')) {
            Schema::create('projects', function (Blueprint $table) {
                $table->id();
                $table->string('project_slug')->nullable();
                $table->string('title')->nullable();
                $table->string('category')->nullable();
                $table->string('category_name')->nullable();
                $table->string('tech')->nullable();
                $table->text('description')->nullable();
                $table->string('status')->nullable();
                $table->text('image')->nullable();
                $table->text('hero_image')->nullable();
                $table->text('screenshots')->nullable();
                $table->longText('full_desc')->nullable();
                $table->text('features')->nullable();
                $table->text('metrics')->nullable();
                $table->integer('order_num')->default(0);
                $table->string('seo_title')->nullable();
                $table->text('seo_desc')->nullable();
                $table->text('seo_keywords')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
