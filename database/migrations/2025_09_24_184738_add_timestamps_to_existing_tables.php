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
        // Add timestamps to categories table
        if (!Schema::hasColumn('categories', 'created_at')) {
            Schema::table('categories', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Add timestamps to products table
        if (!Schema::hasColumn('products', 'created_at')) {
            Schema::table('products', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Add timestamps to orders table
        if (!Schema::hasColumn('orders', 'created_at')) {
            Schema::table('orders', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Add timestamps to order_details table
        if (!Schema::hasColumn('order_details', 'created_at')) {
            Schema::table('order_details', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Add timestamps to order_items table
        if (!Schema::hasColumn('order_items', 'created_at')) {
            Schema::table('order_items', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Add timestamps to cart_items table
        if (!Schema::hasColumn('cart_items', 'created_at')) {
            Schema::table('cart_items', function (Blueprint $table) {
                $table->timestamps();
            });
        }

        // Add timestamps to addresses table
        if (!Schema::hasColumn('addresses', 'created_at')) {
            Schema::table('addresses', function (Blueprint $table) {
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('order_details', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('order_items', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('cart_items', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('addresses', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
};
