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
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Название группы (например: 306-22)
            $table->string('specialty'); // Специальность
            $table->integer('year'); // Год поступления
            $table->integer('course'); // Курс (1, 2, 3, 4)
            $table->boolean('is_active')->default(true); // Активна ли группа
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
