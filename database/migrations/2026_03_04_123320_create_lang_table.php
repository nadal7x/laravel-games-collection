<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lang', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('code', 10)->unique();
            $table->string('locale', 10)->unique();
            $table->boolean('active')->default(true);
            $table->boolean('default')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lang');
    }
};
