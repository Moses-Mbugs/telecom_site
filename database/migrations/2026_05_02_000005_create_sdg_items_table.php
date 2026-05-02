<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sdg_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('sdg_number');
            $table->string('title');
            $table->text('description');
            $table->text('company_contribution');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sdg_items');
    }
};
