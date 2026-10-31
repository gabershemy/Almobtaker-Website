<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('team')) {
            Schema::create('team', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('role')->nullable();
                $table->string('icon')->nullable();
                $table->string('image')->nullable();
                $table->integer('order_num')->default(0);
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('team');
    }
};
