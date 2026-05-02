<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $existing = \DB::select(
            "SELECT CONSTRAINT_NAME FROM information_schema.KEY_COLUMN_USAGE
             WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'products'
             AND REFERENCED_TABLE_NAME IS NOT NULL"
        );
        $fkNames = array_column($existing, 'CONSTRAINT_NAME');

        Schema::table('products', function (Blueprint $table) use ($fkNames) {
            if (in_array('products_category_id_foreign', $fkNames)) {
                $table->dropForeign(['category_id']);
            }
            if (in_array('products_brand_id_foreign', $fkNames)) {
                $table->dropForeign(['brand_id']);
            }
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('brand_id')->references('id')->on('brands')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropForeign(['brand_id']);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
        });
    }
};
