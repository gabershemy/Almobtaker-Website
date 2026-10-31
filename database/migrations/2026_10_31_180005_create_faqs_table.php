<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('faqs')) {
            Schema::create('faqs', function (Blueprint $table) {
                $table->id();
                $table->string('category')->nullable();
                $table->text('question')->nullable();
                $table->text('answer')->nullable();
                $table->integer('order_num')->default(0);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
