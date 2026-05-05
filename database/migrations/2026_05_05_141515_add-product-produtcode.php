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
        // Add the 'product_code' column to the 'products' table
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_code')->unique()->after('id'); // Add 'product_code' column after 'id' and make it unique
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove the 'product_code' column from the 'products' table
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('product_code');
        });
    }
};
